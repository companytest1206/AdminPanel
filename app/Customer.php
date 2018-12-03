<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Product;

class Customer extends Authenticatable
{
    use Notifiable;
	protected $table = 'customer';
	protected $primaryKey = 'cust_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phone', 'email',
    ];

	public function product() {
    	return $this->hasMany(Product::class);
	}
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
