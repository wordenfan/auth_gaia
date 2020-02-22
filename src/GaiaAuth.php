<?php
/**
 * Created by PhpStorm.
 * User: benchao
 * Date: 16/11/22
 */

namespace Labsys\GaiaAuth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Facades\JWTAuth;

class GaiaAuth
{
    public $app;

    //
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * 角色检验,参数二支持全匹配、部分匹配检验
     *
     * @param  array|int|string $role
     * @param  bool  $requireAll 全匹配、半匹配
     * @return bool
     */
    public function hasRole($role, $requireAll = false)
    {
        if ($user = $this->user()) {
            return $user->hasRole($role, $requireAll);
        }
        return false;
    }

    /**
     * 权限校验,参数二支持全匹配、部分匹配检验
     *
     * @param  array|int|string  $permission
     * @param  bool  $requireAll 全匹配、半匹配
     * @return bool
     */
    public function canDo($permission, $requireAll = false)
    {
        if ($user = $this->user()) {
            return $user->canDo($permission, $requireAll);
        }
        return false;
    }

    /*
     * 获取当前认证用户的Eloquent实例
     *
     * @return \Illuminate\Database\Eloquent\Model
    */
    public function user()
    {
        return $this->app->auth->user();
    }
}
