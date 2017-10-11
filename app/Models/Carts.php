<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class Carts extends Model
{

	protected $table = 'carts';
	protected $primaryKey = 'cart_id';
	
	public function user_cart()
	{
		return $this->hasOne('App\User', 'cart_id', 'cart_id');
	}
	




	
}