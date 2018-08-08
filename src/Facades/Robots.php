<?php

namespace Robots\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class RobotsFacade.
 */
class Robots extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'robots';
    }
}
