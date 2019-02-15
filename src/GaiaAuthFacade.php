<?php
namespace Labsys\GaiaAuth;

use Illuminate\Support\Facades\Facade;

class GaiaAuthFacade extends Facade
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
