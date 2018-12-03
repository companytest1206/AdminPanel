<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Team;

class Company extends Authenticatable
{
    use Notifiable;
	protected $table = 'company';
	protected $primaryKey = 'cid';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comp_name', 'comp_url', 
    ];

	public function teams() {
    	return $this->hasMany(Team::class);
	}
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
