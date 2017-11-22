<?php
/**
 * Created by PhpStorm.
 * User: Muratis
 * Date: 09.10.2017
 * Time: 17:41
 */

namespace App\Repositories;
use App\Models\Carts;
use App\Models\shoppingUsers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Support\Facades\DB;

class CartRepository 
{
	private $model;

	public function __construct(Carts $carts, shoppingUsers $shoppingUsers)
	{
		$this->cart = $carts;
		$this->byers = $shoppingUsers;
	}

	public function addCart($data)
	{
		$cart = Cart::add ($data->id, $data->name, 1, $data->price ,  [ 'image'  => $data->image, 'size' => $data->size]);
		return $cart;
	}

	public function  addCartToBase($data)
	{
//		$cart = Cart::content();
//		$r = unserialize(Cart::content());

//		$this->cart->name = $cart;
//		$this->cart->save();
		Cart::store($data->id);
//		var_dump(Cart::content());
		

		$this->byers->first_name = $data->first_name;
		$this->byers->last_name = $data->last_name;
		$this->byers->methodPost = $data->shipping;
		$this->byers->city = $data->city;
		$this->byers->address = $data->address_ship;
		$this->byers->phone = $data->phone;
		$this->byers->cart_id = $data->id;
		$this->byers->save();

		

	}

	public function oneOrder($id)
	{
//		$orders = $this->cart
//			->select('cart_id', 'name')
//			->where('cart_id', '=', $id)->get();
//		return $orders;
		$restore = Cart::restore($id);
		return $restore;
	}
	

	public function showCart()
	{
		return Cart::content();

	}


	public function removeCart($data)
	{

		$remove = Cart::remove($data->rowId);
		return $remove;

	}

		
}