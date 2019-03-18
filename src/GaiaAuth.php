<?php
/**
 * Created by PhpStorm.
 * User: benchao
 * Date: 16/11/22
 */

namespace Labsys\GaiaAuth;

use Illuminate\Support\Facades\Auth;
use Labsys\GaiaAuth\Contracts\ShakaAuthRoleInterface;
use Labsys\GaiaAuth\Traits\GaiaAuthRoleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use League\Flysystem\Plugin\PluggableTrait;
use Tymon\JWTAuth\Facades\JWTAuth;

class GaiaAuth
{
    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;
    /**
     * Create a new confide instance.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }
    /**
     * Checks if the current user has a role by its name
     *
     * @param string $name Role name.
     *
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
     * Check if the current user has a permission by its name
     *
     * @param string $permission Permission string.
     *
     * @return bool
     */
    public function canDo($permission, $requireAll = false)
    {
        if ($user = $this->user()) {
            return $user->canDo($permission, $requireAll);
        }
        return false;
    }
    /**
     * Get the currently authenticated user or null.
     *
     * @return Illuminate\Auth\UserInterface|null
     */
    public function user()
    {
        return $this->app->auth->user();
    }
}
