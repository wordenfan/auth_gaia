<?php

namespace Labsys\GaiaAuth\Traits;

use Illuminate\Support\Facades\DB;
use Labsys\GaiaAuth\BasePermission;
use Labsys\GaiaAuth\Plugin\PluginInterface;
use APP\Models\Role;
use Illuminate\Support\Facades\Config;
use Exception;

/**
 * This file is part of Entrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Zizaco\Entrust
 */


trait GaiaAuthUserTrait
{

    /*
     * 校验是否有某个角色或全部角色
     * @param array|int
     * @param bool
     * return bool
     */
    public function hasRole($attr, $requireAll = false)
    {
        $check_arr = is_array($attr) ? $attr : [$attr];
        $role_list = $this->roleList();
        foreach ($check_arr as $k=>$roleItem) {
            if(is_int($roleItem)) {
                $res = array_key_exists($roleItem, $role_list);
            }else{
                $res = in_array($roleItem,$role_list);
            }
            $result_arr[] = $res;

            if($requireAll && !$res){
                return false;
            }elseif(!$requireAll && $res){
                return true;
            }
        }
        return $requireAll ? true : false;
    }

    /* 校验是否具备某个权限
     * @param int|string|array 支持id或name的单个 或数组形式
     * return bool
     */
    public function canDo($permission_name)
    {
        $role_list = $this->roles()->get();
        foreach($role_list as $role){
            $chk_res = $role->hasPermission($permission_name);
            if($chk_res){
                return true;
            }
        }
        return false;
    }

    /*
     * 增加角色
     * @param mixed
     * return null
     */
    public function attachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }elseif (is_array($role)) {
            $role = $role['id'];
        }

        $roleIds = array_keys($this->roleList());
        if(in_array($role,$roleIds)) {
            throw new Exception('this role id '.$role.' has been added in the role_user table');
        };

        app(Config::get('auth_gaia.role'))->find($role);
        $this->roles()->attach($role);

        return true;
    }

    /*
     * 删除角色
     * @param mixed
     * return null
     */
    public function detachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }elseif (is_array($role)) {
            $role = $role['id'];
        }

        $roleIds = array_keys($this->roleList());
        if(!in_array($role,$roleIds)) {
            throw new Exception('please make sure the role id '.$role.' in the role_user table');
        };
        $this->roles()->detach($role);

        return true;
    }

    /*
     * 角色列表
     * @param array
     * return array
     * TODO 目前暂只支持id,name
     */
    public function roleList(array $select=[])
    {
        $select = array_merge($select,['id','pinyin']);

        $role_list = $this->roles()->select($select)->get()->toArray();
        $return_arr = [];
        foreach($role_list as $role){
            $return_arr[$role['id']] = $role['pinyin'];
        }

        return $return_arr;
    }

    /*
     * 用户全部角色
    */
    public function roles()
    {
        return $this->belongsToMany(Config::get('auth_gaia.role'), Config::get('auth_gaia.role_user_table'), 'user_id', 'role_id');
    }

    /*
     * @select 显示的字段
     * @rank是否树形排序
    */
    public function menuPermList(Array $select=[],$rank=true){
        $allPermArr = $this->allPerm($select);
        $menuPermArr = array_map(function($item){if($item['type'] == 1){return $item;}},$allPermArr);
        $menuPermArr = array_filter($menuPermArr);

        if($rank){
            $rankMenuArr = $this->rankMenuList($menuPermArr);
            $menuPermArr = $rankMenuArr;
        }

        return $menuPermArr;
    }

    /*
     * 返回全部权限数据
    */
    public function allPerm(Array $select=[]){
        $roleList = $this->roles()->select(['*'])->get()->all();
        $allRolesPermArr = [];
        foreach($roleList as $role)
        {
            $allRolesPermArr[] = $role->perms();
        }

        $select = empty($select) ? ['*'] : array_merge($select,['id','type','level','pid']);
        $oneDimensionalMenu = [];
        foreach($allRolesPermArr as $perm){
            $itemVal = $perm->where(['status'=>1])->select($select)->orderBy('sort','asc')->get()->toArray();
            $itemKey = array_column($itemVal,'id');
            $res = array_combine($itemKey,$itemVal);
            $oneDimensionalMenu = $oneDimensionalMenu + $res;
        }
        $allPermArr = array_values($oneDimensionalMenu);

        return $allPermArr;
    }

    //菜单进行目录树整理
    private function rankMenuList($originArr,$pid)
    {
        $tree = array();                                //每次都声明一个新数组用来放子元素
        foreach ($originArr as $v) {
            if ($v['pid'] == $pid) {                      //匹配子记录
                $v['list'] = $this->rankMenuList($originArr, $v['id']); //递归获取子记录
                if ($v['list'] == null) {
                    unset($v['list']);             //如果子元素为空则unset()进行删除，说明已经到该分支的最后一个元素了（可选）
                }
                $tree[] = $v;                           //将记录存入新数组
            }
        }
        return $tree;
    }
}
