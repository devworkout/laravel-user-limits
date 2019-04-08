<?php

namespace DevWorkout\UserLimits\Models;

use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{

    protected $guarded = [];
    protected $table = 'limit_usage';
    protected $dates = [
        'created_at',
        'updated_at',
        'refreshed_at',
        'next_refresh_at',
    ];

    protected $appends = [
        'next_refresh_at',
    ];

    public function getNextRefreshAtAttribute()
    {
        return $this->refreshed_at->addMonth();
    }

    public function scopeToBeRefreshed( $q )
    {
        return $q->whereHas( 'limit', function ( $q )
        {
            return $q->where( 'period', 'monthly' );
        } )->where( 'refreshed_at', '<', now()->subMonth() );
    }

    public function limit()
    {
        return $this->belongsTo( Limit::class );
    }

    public function reset()
    {
        $this->update( [ 'used' => 0, 'refreshed_at' => now(), ] );
    }

}