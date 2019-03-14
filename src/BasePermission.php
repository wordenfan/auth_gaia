<?php
/**
 * Created by PhpStorm.
 * User: benchao
 * Date: 16/12/6
 */

namespace Labsys\GaiaAuth;


use Labsys\GaiaAuth\Plugin\AuthFunc;
use Labsys\GaiaAuth\Plugin\AuthMenu;
use Labsys\GaiaAuth\Plugin\PluginTrait;
use Illuminate\Support\Collection;

class BasePermission
{
    use PluginTrait;

    public $allRolesPermArr = [];

    public function __construct(Array $roleList)
    {
        foreach($roleList as $role)
        {
            $this->allRolesPermArr[] = $role->perms();
        }

        $this->init();
    }

    public function init()
    {
        $this->addPlugin(new AuthMenu());
        $this->addPlugin(new AuthFunc());
    }
}
