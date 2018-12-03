<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Company;

class Contact extends Authenticatable
{
    use Notifiable;
	protected $table = 'contact_no';
	protected $primaryKey = 'cont_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_id', 'contact_no1', 'contact_no2', 'contact_father', 'contact_mother' 
    ];

}
