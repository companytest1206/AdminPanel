<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Company;

class Team extends Authenticatable
{
    use Notifiable;
	protected $table = 'team';
	protected $primaryKey = 'tid';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_name', 'company_id', 
    ];

	public function company() {
    	return $this->belongsTo(Company::class);
	}
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
