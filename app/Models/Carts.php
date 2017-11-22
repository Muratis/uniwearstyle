<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class Carts extends Model
{

	protected $table = 'shoppingcart';
	protected $primaryKey = 'cart_id';
	
	public function user_carts()
	{
		return $this->hasOne('App\Models\shoppingUsers', 'cart_id', 'identifier');
	}
	




	
}