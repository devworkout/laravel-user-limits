<?php

namespace DevWorkout\UserLimits;

use DevWorkout\UserLimits\Models\Limit;
use DevWorkout\UserLimits\Models\Usage;

class UserLimitsClass
{
    protected $user;
    /**
     * @var string
     */
    protected $subject;
    /**
     * @var Limit
     */
    protected $limit;
    /**
     * @var Usage
     */
    protected $usage;

    /**
     * Create a new UserLimits Instance.
     */
    public function __construct( $user, string $subject, string $package = null )
    {
        // constructor body
        $this->user = $user;
        $this->subject = $subject;

        $this->limit = Limit::where( 'subject', $subject )->where( 'package', $user->resolvePackage() )->first();
        $this->usage = $this->limit->usages()->firstOrCreate( [
            'user_id' => $this->user->id,
        ] );

    }

    public function reset()
    {
        $this->usage->reset();
    }

    public function next_refresh_at()
    {
        return $this->usage->next_refresh_at;
    }

    public function refreshed_at()
    {
        return $this->usage->refreshed_at;
    }

    public function decrement( $number = 1 )
    {
        $this->usage->decrement( 'used', $number );
    }

    public function increment( $number = 1 )
    {
        $this->usage->increment( 'used', $number );
    }

    public function used()
    {
        return $this->usage->used;
    }

    public function allowed()
    {
        if ( $this->limit->allowed == -1 )
        {
            return INF;
        }
        return $this->limit->allowed;
    }

    public function remaining()
    {
        return $this->allowed() - $this->used();
    }

    public function exceeded()
    {
        return $this->remaining() == 0;
    }


}
