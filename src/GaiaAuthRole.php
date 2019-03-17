<?php
/**
 * Created by PhpStorm.
 * User: benchao
 * Date: 16/11/22
 */

namespace Labsys\GaiaAuth;

use Labsys\GaiaAuth\Contracts\ShakaAuthRoleInterface;
use Labsys\GaiaAuth\Traits\GaiaAuthRoleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use League\Flysystem\Plugin\PluggableTrait;

class GaiaAuthRole extends Model implements ShakaAuthRoleInterface
{
    use GaiaAuthRoleTrait;

    protected $table;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('auth_gaia.roles_table');
    }
}
