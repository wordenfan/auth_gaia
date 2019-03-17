## 概述

Labsys Gaia权限管理系统，参考了[Zizaco/entrust](https://github.com/Zizaco/entrust)，基于laravel5.5以上开发支持

## 安装方法

```bash
composer require "labsys/auth-gaia:1.2.x-dev"
#生成自动加载文件
composer dump-autoload
#包更新
composer update "labsys/auth-gaia"
```
## 使用说明
1：生成config文件及执行文件
```bash
php artisan vendor:publish
php artisan migrate
```
2：在Model/Admin/Auth目录下增加ORM实例
```bash
AuthPermission.php
AuthRole.php
```
3：User的Model增加traits引用
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
