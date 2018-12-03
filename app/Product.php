<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Product;

class Product extends Authenticatable
{
    use Notifiable;
	protected $table = 'product';
	protected $primaryKey = 'prod_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prod_name', 'prod_description', 'prod_price', 
    ];

	public function product() {
    	return $this->belongsTo(Customer::class);
	}
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
