<?php

namespace DevWorkout\UserLimits\Commands;

use DevWorkout\UserLimits\Models\Usage;
use Illuminate\Console\Command;

class RefreshLimits extends Command
{
    protected $signature = 'limits:refresh';
    protected $description = 'Refresh limits usage';

    public function handle()
    {
        $refreshed = Usage::toBeRefreshed()->update( [
            'refreshed_at' => now(),
            'used'         => 0,
        ] );

        $this->info( 'Limits refreshed: ' . $refreshed );
    }
}
