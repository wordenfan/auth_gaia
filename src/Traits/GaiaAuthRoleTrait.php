<?php

namespace Labsys\GaiaAuth\Traits;

use Labsys\GaiaAuth\Plugin\AbstractPlugin;
use Labsys\GaiaAuth\Plugin\AuthMenu;
use Labsys\GaiaAuth\Plugin\PluginInterface;
use APP\Models\PermissionMenu;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

use App\Models\Backend\Auth\AuthPermission;

/**
 * This file is part of Entrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Zizaco\Entrust
 */


trait GaiaAuthRoleTrait
{
    /*
     * 角色下的用户列表
     * @param array $select 要筛选的字段
     * return array 一维数组
    */
    public function userList(array $select=[]){
        $select = array_merge($select,['id','name']);
        $user_list = $this->users()->select($select)->get()->toArray();
        $return_arr = array_column($user_list,null,'id');

        return $return_arr;
    }

    /*
     * 权限判定
     * @param int|array $attr 权限的id或pinyin
     * return bool 全匹配bool值
     */
    public function hasPermission($attr)
    {
        $check_arr = is_array($attr) ? $attr : [$attr];
        $permission_list = $this->permissionList();
        foreach ($check_arr as $permItem) {
            if(is_int($permItem)) {
                $res = array_key_exists($permItem, $permission_list);
            }else{
                $res = in_array($permItem,array_column($permission_list,'pinyin'));
            }

            if(!$res){
                return false;
            }
        }

        return true;
    }

    /*
     * 权限添加
     * @param int|array $permission 权限id
     * return bool 全匹配bool值
    */
    public function attachPermission($permission)
    {
        $this->permissionValidate($permission);
        return $this->perms()->attach($permission);
    }

    //权限删除
    public function detachPermission($permission)
    {
        $this->permissionValidate($permission);
        $this->perms()->detach($permission);
    }

    /*
     * 1:参数内各元素必须为整形
     * 2:该permission_id在表中真实存在
    */
    private function permissionValidate($permission){
        $permArr = is_array($permission) ? $permission : [$permission];
        $filterArr = array_map(function($item){return is_int($item) ? $item : '';},$permission);
        if( count(array_filter($filterArr)) != count($permArr) ){
            throw new \Exception('the param must be integer');
        }

        $findPermNum = app(Config::get('auth_gaia.permission'))->whereIn('id',$permArr)->get()->pluck('id')->toArray();
        $diffArr = array_diff($permArr,$findPermNum);
        if( count($findPermNum) != count($permArr) ){
            throw new \Exception('there are some permission not found in permission table;  idsStr:'.implode(';',$diffArr));
        }
        return true;
    }

    /*
     * 总权限列表
    */
    public function permissionList(array $select=[])
    {
        $select = array_merge($select,['id','pinyin']);
        $permission_list = $this->perms()->select($select)->get()->toArray();
        $return_arr = array_column($permission_list,null,'id');
        return $return_arr;
    }

    public function perms()
    {
        return $this->belongsToMany(Config::get('auth_gaia.permission'), Config::get('auth_gaia.role_permission_table'), 'role_id' ,'permission_id');
    }

    public function users()
    {
        return $this->belongsToMany(Config::get('auth_gaia.user'), Config::get('auth_gaia.role_user_table'), 'role_id', 'user_id');
    }

}
