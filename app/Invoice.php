<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Invoice extends Authenticatable
{
    use Notifiable;
	protected $table = 'invoice';
	protected $primaryKey = 'inv_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cust_name','prod_name','prod_qty','prod_price','tax','sub-total','total'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
