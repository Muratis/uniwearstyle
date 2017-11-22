<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class shoppingUsers extends Model
{

	protected $table = 'shoppingUsers';
	protected $primaryKey = 'user_id';

	public function user_carts()
	{
		return $this->hasOne('App\Models\Carts', 'identifier', 'cart_id');
	}






}