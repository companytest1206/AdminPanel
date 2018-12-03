<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Event extends Authenticatable
{
    use Notifiable;
	protected $table = 'calendar';
	protected $primaryKey = 'cid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_days', 'total_sundays', 'sat_off', 'fest_off', 'work_days', 'mins_per_day', 'mins_month'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  
}
