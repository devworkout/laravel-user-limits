<?php

namespace DevWorkout\UserLimits\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\Macroable;

class Limit extends Model
{
    use Macroable;

    protected $guarded = [];

    public function usages()
    {
        return $this->hasMany( Usage::class );
    }


}