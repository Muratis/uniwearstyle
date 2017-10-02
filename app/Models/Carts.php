<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Gloudemans\Shoppingcart\Facades\Cart;

class Carts extends Model
{
	protected $tshirt;
	public function __construct(array $attributes = [], Tshirt $tshirt)
	{
		parent::__construct($attributes);
		$this->tshirt = $tshirt;
	}

	public function addCart($data)
	{
	$tshirt = $this->tshirt->oneTshirt($data);
		$images = $tshirt->image;
		$image = explode(',', $images);
		
		$cart = Cart::add ($data->tshirt_id, $tshirt->name, 1, $tshirt->price ,  [ 'image'  =>  $image[0]]);
		return $cart;

		if ($data->rowId) {
			Cart::remove($data->rowId);
		}
	}



	public function showCart()
	{
		$show = Cart::content();
		return $show;
	}


	public function removeCart($data)
	{

		$remove = Cart::remove($data->rowId);
		return $remove;

	}
	
}