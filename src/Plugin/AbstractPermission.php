<?php

namespace Labsys\GaiaAuth\Plugin;

use DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractPermission extends Model implements PluginInterface
{
    protected $base_permission;
    protected $base_permission_table;
    protected $auth_type;
    protected $table_name;
    protected $menu_level;

    public function __construct()
    {
        $this->base_permission_table = Config::get('auth_gaia.permissions_table');
    }

    public function setBasePermission(Array $basePermission){
        $this->base_permission = $basePermission;
    }

}
