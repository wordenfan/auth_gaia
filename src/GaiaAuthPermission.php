<?php
/**
 * Created by PhpStorm.
 * User: benchao
 * Date: 16/11/22
 */

namespace Labsys\GaiaAuth;

use Labsys\GaiaAuth\Plugin\AbstractPlugin;
use Labsys\GaiaAuth\Traits\GaiaAuthRoleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class GaiaAuthPermission extends Model
{
    use GaiaAuthRoleTrait;

    protected $table;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('auth_gaia.permissions_table');
    }
}
