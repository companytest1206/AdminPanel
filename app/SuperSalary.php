<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperSalary extends Authenticatable
{
    use Notifiable;
	protected $table = 'super_cal_salary';
	protected $primaryKey = 'sup_sal_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_id', 'cid', 'work_days_before_change', 'mins_month_before_change', 'old_basic_salary', 'before_change_leave_DHM', 'before_change_pay_sal', 'work_days_after_change', 'mins_month_after_change', 'new_basic_salary', 'prof_tax', 'after_change_leave_DHM', 'adv_paid', 'sal_encash', 'tds_deduct', 'after_change_pay_sal', 'final_pay_sal', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  
}
