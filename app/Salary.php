<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Salary extends Authenticatable
{
    use Notifiable;
	protected $table = 'salary';
	protected $primaryKey = 'sal_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_id', 'cid', 'working_DHM', 'basic_sal', 'prof_tax', 'leave_DHM', 'pay_sal', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  
}
