<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;
	protected $table = 'employee';
	protected $primaryKey = 'emp_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_name', 'emp_address', 'emp_phone', 'emp_image', 'emp_gender', 'email', 'emp_designation', 'emp_role', 'company_id', 'team_id', 'emp_salary'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  
}
