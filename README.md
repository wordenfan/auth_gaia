## 概述

This is a auth_gaia for test
inspire by [Zizaco/entrust](https://github.com/Zizaco/entrust)

## 安装方法

```bash
composer require "labsys/auth-gaia:1.x-dev"
#生成自动加载文件
composer dump-autoload
#包更新
composer update "labsys/auth-gaia"
```
## 使用说明
###### auth_permission_开头的表名为权限类型插件
1：增加provider，在config/app.php的providers数组增加如下内容：
```bash
Labsys\GaiaAuth\Providers\GaiaAuthServiceProvider::class
```
2：增加Facade
```bash
'GaiaAuth' => Labsys\GaiaAuth\Facades\GaiaAuthFacade::class,
```
3：生成config文件
```bash
php artisan vendor:publish
```
4：添加中间件
kernel.php的$routeMiddleware增加中间件
```bash
'gaiaAuth' => \Labsys\GaiaAuth\Middleware\GaiaAuth::class
```
5：Model/Admin/Auth目录下增加两个trait
```bash
AuthPermission.php 和 AuthRole.php
```
6：User的Model增加traits引用
```bash
use Labsys\GaiaAuth\Traits\GaiaAuthUserTrait;
```

## 使用范例
user的调用方法
```bash
$user = User::where('id',1056)->first();
$res = $user->roleList();
$res = $user->hasRole([25,26]);
$res = $user->attachRole(27);
$res = $user->detachRole(27);
$res = $user->canDo([12,'manage_posts3']);
$res = $user->basePermission()->menu();
$res = $user->basePermission()->func();
```
role的调用方法
```bash
$role = Role::where('id',25)->first();
$res2 = $role->attachPermission(17);
$res2 = $role->detachPermission([18]);
$res2 = $role->userList();
$res2 = $role->hasPermission(['manage_posts2','manage_posts3']);
$res2 = $role->permissionList();
$res2 = $role->basePermission()->menu();
```
