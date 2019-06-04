<?php

namespace Labsys\GaiaAuth\Traits;

use Labsys\GaiaAuth\Plugin\AbstractPlugin;
use Labsys\GaiaAuth\Plugin\AuthMenu;
use Labsys\GaiaAuth\Plugin\PluginInterface;
use APP\Models\Permission;
use APP\Models\PermissionMenu;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

/**
 * This file is part of Entrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Zizaco\Entrust
 */


trait GaiaAuthRoleTrait
{
    //查询该角色的所有用户 return array
    //TODO 目前暂只支持id,name
    public function userList(array $select=[]){
        $select = array_merge($select,['id','name']);

        $user_list = $this->users()->select($select)->get()->toArray();

        $return_arr = [];
        foreach($user_list as $user){
            $return_arr[$user['id']] = $user['name'];
        }

        return $return_arr;
    }

    /** 权限判定
     * @param int|array 支持id或name的单个 或数组形式
     * return bool
     */
    public function hasPermission($attr)
    {
        $check_arr = is_array($attr) ? $attr : [$attr];
        $permission_list = $this->permissionList();

        foreach ($check_arr as $permItem) {
            if(is_int($permItem)) {
                $res = array_key_exists($permItem, $permission_list);
            }else{
                $res = in_array($permItem,$permission_list);
            }

            if(!$res){
                return false;
            }
        }

        return true;
    }

    //权限添加,支持int型id 或arr
    public function attachPermission($permission)
    {
        $this->perms()->attach($permission);
    }

    //权限删除
    public function detachPermission($permission)
    {
        $this->perms()->detach($permission);
    }

    /*
     * 总权限列表
    */
    public function permissionList(array $select=[])
    {
        $select = array_merge($select,['id','name']);
        $permission_list = $this->perms()->select($select)->get()->toArray();

        $return_arr = [];
        foreach($permission_list as $perm){
            $return_arr[$perm['id']] = $perm['name'];
        }

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
