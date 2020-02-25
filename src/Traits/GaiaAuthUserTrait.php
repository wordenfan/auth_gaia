<?php

namespace Labsys\GaiaAuth\Traits;

use Illuminate\Support\Facades\DB;
use Labsys\GaiaAuth\Plugin\PluginInterface;
use APP\Models\Role;
use Illuminate\Support\Facades\Config;
use Exception;


trait GaiaAuthUserTrait
{
    /*
     * 角色列表
     * @param array $fieldArr 要筛选的字段
     * return array
     */
    public function roleList($fieldArr=[])
    {
        $select = array_merge(['id','pinyin','label'],$fieldArr);
        $role_list = $this->roles()->select($select)->get()->toArray();
        $role_list = array_column($role_list,null,'id');
        return $role_list;
    }

    /*
     * 校验是否有某个角色或全部角色
     *
     * @param array|int|string $role
     * @param  bool  $requireAll 全匹配、半匹配
     * return bool
     */
    public function hasRole($role, $requireAll = false)
    {
        $check_arr = is_array($role) ? $role : [$role];
        $role_list = $this->roleList();
        foreach ($check_arr as $k=>$roleItem) {
            if(is_int($roleItem)) {
                $res = array_key_exists($roleItem, $role_list);
            }else{
                $pinyinArr = array_values(array_column($role_list,'pinyin'));
                $res = in_array($roleItem,$pinyinArr);
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

    /*
     * 增加角色
     * @param int $roleId
     * return bool
     * @throws \Exception
     */
    public function attachRole($roleId)
    {
        if (!is_int($roleId)) {
            throw new Exception('param roleId must be int type');
        }

        $roleIds = array_keys($this->roleList());
        if(in_array($roleId,$roleIds)) {
            return true;
        };

        $res = app(Config::get('auth_gaia.role'))->find($roleId);
        if(empty($res)){
            throw new Exception('this role id '.$roleId.' is not find in role table');
        }
        $this->roles()->attach($roleId);
        return true;
    }

    /*
     * 删除角色
     * @param int $roleId
     * return bool
     * @throws \Exception
     */
    public function detachRole($roleId)
    {
        if (!is_int($roleId)) {
            throw new Exception('param roleId must be int type');
        }

        $roleIds = array_keys($this->roleList());
        if(!in_array($roleId,$roleIds)) {
            throw new Exception('please make sure the role id '.$roleId.' in the role_user table');
        };
        $this->roles()->detach($roleId);
        return true;
    }



    /*
     * 角色权限校验
     * @param int|string|array $permission 支持id或name的单个或数组形式
     * return bool
     */
    public function canDo($permission)
    {
        $role_list = $this->roles()->get();
        $perm_id = [];
        $perm_py = [];
        foreach($role_list as $role){
            $role_permission_list = $role->permissionList();
            $perm_id = array_merge($perm_id,array_column($role_permission_list,'id'));
            $perm_py = array_merge($perm_py,array_column($role_permission_list,'pinyin'));
        }
        $all_perm = array_merge($perm_id,$perm_py);
        if(empty(array_diff($permission,$all_perm))){
            return true;
        }
        return false;
    }

    /*
     * 左侧的菜单树(支持无限极递归树)
     * @param array select 要筛选的字段
     * @param bool rank true则返回排序后的树形多维数组,false则返回一维数组
     * return array
    */
    public function menuPermList(Array $select=[],$rank=true){
        $allPermArr = $this->allPerm($select);

        $menuPermArr = [];
        foreach($allPermArr as $k => $item){
            if($item['type'] == 1){
                unset($item['pivot']);
                $menuPermArr[] = $item;
            }
        }
        $menuPermArr = array_filter($menuPermArr);

        if($rank){
            $rankMenuArr = $this->rankMenuList($menuPermArr,0);
            $menuPermArr = $rankMenuArr;
        }

        return $menuPermArr;
    }

    /*
    * 角色全部权限,设为private防止滥用,避免用户与权限直接挂钩,推荐通过角色挂钩
    * @param array $select 要筛选的字段
    * return array 一维数组
    */
    private function allPerm(Array $select=[]){
        $roleList = $this->roles()->select(['*'])->get()->all();
        $allRolesPermArr = [];
        foreach($roleList as $role)
        {
            $allRolesPermArr[] = $role->perms();
        }

        $select = empty($select) ? ['*'] : array_merge($select,['id','type','pid']);
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

    //用户全部角色
    private function roles()
    {
        return $this->belongsToMany(Config::get('auth_gaia.role'), Config::get('auth_gaia.role_user_table'), 'user_id', 'role_id');
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
