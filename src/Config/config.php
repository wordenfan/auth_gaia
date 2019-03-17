<?php
/**
 * Created by PhpStorm.
 * User: benchao
 * Date: 16/11/22
 */
return [
    //基础表名
    'table_prefix'          => 'dfq_',
    'users_table'           => 'auth_admins',
    'roles_table'           => 'auth_roles',
    'permissions_table'     => 'auth_permissions',
    'role_user_table'       => 'auth_role_user',
    'role_permission_table' => 'auth_role_permission',

    //插件
    'plugin' =>[
        'func_table' => 'auth_permission_func',
        'menu_table' => 'auth_permissions',
    ],

    //Eloquent实例
    'user' => 'App\Models\Admin\Admin',
    'role' => 'App\Models\Admin\Auth\AuthRole',
    'permission' => 'App\Models\Admin\Auth\AuthPermission',

    //目录树层级
    'menu_level'=>5,
    //空间前缀
    'namespace_prefix'=>'App\Http\Controllers',

    //白名单
    'white_list'=>[
//        'API\V1\Admin\PatientMgmtController',
//        'API\V1\Admin\PatientMgmtController\getList',
    ]
];
