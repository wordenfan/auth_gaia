[![Version](https://img.shields.io/badge/worden-auth--gaia-brightgreen.svg)](https://packagist.org/packages/labsys/auth-gaia)
[![License](https://poser.pugx.org/zizaco/entrust/license.svg)](https://packagist.org/packages/labsys/auth-gaia)
## 概述

Labsys Gaia权限管理系统，参考了[Zizaco/entrust](https://github.com/Zizaco/entrust)，基于laravel5.5以上开发支持

## 安装方法

```bash
composer require "labsys/auth-gaia:1.2.x-dev"
#包更新
composer update "labsys/auth-gaia"
```
## 使用说明
1：生成config文件及执行文件
```bash
# 清空配置缓存
php artisan config:clear

php artisan vendor:publish --class=GaiaAuthServiceProvider
php artisan migrate
```
2：生成自动加载文件填充数据
```bash
composer dump-autoload
php artisan db:seed --class=PermissionBaseTableSeeder
```
3：在Model/Admin/Auth目录下增加ORM实例
```bash
AdminUser.php
AuthPermission.php
AuthRole.php

# ORM实例增加pivot过滤
protected $hidden=['pivot'];

# ORM实例分别增加traits引用
use GaiaAuthUserTrait;
use GaiaAuthRoleTrait;
use GaiaAuthPermissionTrait;
```
## Blade模板的使用
```bash
@role('chaojiguanliyuan')
<p>This is visible to users with the 超级管理员 role</p>
@endrole

@permission('tongyituikuan')
<p>This is visible to users with the 同意退款 permission</p>
@endpermission

<button @nopermission('ddlb_ss') disabled=true @endnopermission >搜索< /button>
```
## Controller使用范例
Facade调用
```bash
$res1 = GaiaAuth::user();//返回认证后的ORM对象
$res2 = GaiaAuth::hasRole([1,'kefu']，true);//参数二[选填]
$res3 = GaiaAuth::canDo([11,'search_bt']，true);//参数二[选填]
```

user的调用方法
```bash
$user = AdminUser::where('name','15577901841')->first();
$res1 = $user->roleList(['description','status']);//参数一[选填]，为筛选的字段
$res2 = $user->hasRole([1,2],true);//参数二[选填],true为全匹配
$res3 = $user->attachRole([4]);//支持int或数组查询
$res4 = $user->detachRole(4);//支持int或数组查询
$res5 = $user->canDo([11,'search_bt']);//id或pinyin混合查找
$res6 = $user->menuPermList();//参数一[选填]要筛选的字段,参数二[选填]是否需树形排序
```
role的调用方法
```bash
$role = AuthRole::where('id',2)->first();
$res2 = $role->userList(['email']);//参数一[选填]要筛选的字段
$res3 = $role->hasPermission(['shopad',14]);//支持数组批量查询,仅全匹配才返回true
$res4 = $role->attachPermission([43,45]);//支持单个或数组批量添加
$res5 = $role->detachPermission(43);//支持单个或数组批量添加
$res6 = $role->permissionList();//返回一维数组
```
