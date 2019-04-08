<?php

namespace DevWorkout\UserLimits\Http\Middleware;

use Closure;

class CheckLimit
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @param $subject
     * @return mixed
     */
    public function handle( $request, Closure $next, $subject, $package = null )
    {
        if ( !auth()->user() )
        {
            return $next( $request );
        }

        if ( auth()->user()->usage( $subject, $package )->exceeded() )
        {
            return abort( 403, ucfirst( $subject ) . ' limit reached' );
        }

        return $next( $request );
    }
}
