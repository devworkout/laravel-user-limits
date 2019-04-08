<?php

namespace DevWorkout\UserLimits\Models;

use DevWorkout\UserLimits\UserLimitsClass;

trait HasLimits
{
    public function usage( $subject, $package = null )
    {
        return new UserLimitsClass( $this, $subject, $package );
    }

    public function resolvePackage()
    {
        return null;
    }

}