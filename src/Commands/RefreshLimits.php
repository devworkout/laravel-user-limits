<?php

namespace DevWorkout\UserLimits\Commands;

use DevWorkout\UserLimits\Events\LimitsRefreshed;
use DevWorkout\UserLimits\Models\Usage;
use Illuminate\Console\Command;

class RefreshLimits extends Command
{
    protected $signature = 'limits:refresh';
    protected $description = 'Refresh limits usage';

    public function handle()
    {
        $refreshed = Usage::toBeRefreshed()->get();
        foreach ($refreshed as $r) {
            $r->update([
                'refreshed_at' => now(),
                'used'         => 0,
            ]);
            event(new LimitsRefreshed($r));
        }


        $this->info('Limits refreshed: ' . count($refreshed));
    }
}
