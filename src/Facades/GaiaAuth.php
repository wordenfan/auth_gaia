<?php
namespace Labsys\GaiaAuth\Facades;

use Illuminate\Support\Facades\Facade;

class GaiaAuth extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'GaiaAuth';
    }
}
