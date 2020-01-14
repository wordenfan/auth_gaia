[![Version](https://img.shields.io/badge/worden-auth--gaia-brightgreen.svg)](https://packagist.org/packages/labsys/auth-gaia)
[![License](https://poser.pugx.org/zizaco/entrust/license.svg)](https://packagist.org/packages/labsys/auth-gaia)
## 概述

Labsys Gaia权限管理系统，参考了[Zizaco/entrust](https://github.com/Zizaco/entrust)，基于laravel5.5以上开发支持

## 包安装

```bash
# 1：下载包
composer require "labsys/auth-gaia:1.2.x-dev"
#包更新
composer update "labsys/auth-gaia"

# 2：生成config文件及执行文件
php artisan vendor:publish
php artisan migrate

# 3：生成自动加载文件和填充数据
composer dump-autoload
php artisan db:seed --class=PermissionBaseTableSeeder
```
## 使用说明
```bash
# 1：在Model/Admin/Auth目录下增加ORM实例
AuthPermission.php
AuthRole.php

# 2：增加traits引用
# AdminUser的引用
use Labsys\GaiaAuth\Traits\GaiaAuthUserTrait;
# AuthRole的引用
use GaiaAuthRoleTrait;
# AuthPermission的引用
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
$res1 = GaiaAuth::hasRole([1,2]);
$res2 = GaiaAuth::canDo([11,'search_bt']);
$res3 = GaiaAuth::user();//返回对象
```

user的调用方法
```bash
$user = Admin::where('name','15577901841')->first();
$res1 = $user->roleList();
$res2 = $user->hasRole([1,2]);//默认任一角色匹配即返回true,参数二全匹配默认值为false
$res3 = $user->attachRole(4);
$res4 = $user->detachRole(4);
$res5 = $user->canDo([11,'search_bt']);//id或pinyin混合查找
$res6 = $user->menuPermList();//返回全部权限二维数组,参数一筛选需显示的字段,默认为[],参数二是否需树形排序,默认为true
```
role的调用方法
```bash
$role = AuthRole::where('id',2)->first();
$res2 = $role->userList();//返回用户数组
$res3 = $role->hasPermission(['shopad','ddlb_hx2']);//支持数组批量查询,仅全匹配才返回true
$res4 = $role->attachPermission([43,45]);//支持单个或数组批量添加
$res5 = $role->detachPermission(43);//支持单个或数组批量添加
$res6 = $role->permissionList();//返回一维数组
```
