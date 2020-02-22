<?php
/**
 * Created by PhpStorm.
 * User: wordenfan
 * Date: 19/11/22
 */
return [
    //基础表名
    'users_table'           => 'admin_users',
    'roles_table'           => 'auth_roles',
    'permissions_table'     => 'auth_permissions',
    'role_user_table'       => 'auth_role_user',
    'role_permission_table' => 'auth_role_permission',

    //Eloquent实例
    'user' => 'App\Models\Admin\AdminUser',
    'role' => 'App\Models\Admin\Auth\AuthRole',
    'permission' => 'App\Models\Admin\Auth\AuthPermission',

    //空间前缀
    'table_prefix'=>'',
    'namespace_prefix'=>'App\Http\Controllers',

    //白名单
    'white_list'=>[
//        'API\V1\Admin\PatientMgmtController',
//        'API\V1\Admin\PatientMgmtController\getList',
    ]
];
