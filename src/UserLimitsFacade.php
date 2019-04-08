<?php

namespace DevWorkout\UserLimits;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Exfriend\UserLimits\UserLimitsClass
 */
class UserLimitsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-user-limits';
    }
}
