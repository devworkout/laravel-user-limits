<?php

namespace DevWorkout\UserLimits\Events;

use DevWorkout\UserLimits\Models\Usage;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LimitsRefreshed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $usage;

    public function __construct(Usage $usage)
    {
        $this->usage = $usage;
    }

}
