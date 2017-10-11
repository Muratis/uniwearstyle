<?php
/**
 * Created by PhpStorm.
 * User: Muratis
 * Date: 09.10.2017
 * Time: 17:41
 */

namespace App\Repositories;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Contracts\Buyable;

Class CartRepository 
{

	protected $model = 'Carts';
	protected $table = 'carts';

//	protected $tshirt;
//	protected $polo;
//	protected $bomber;
//	protected $hoodie;
//	protected $sweatshirt;
	
//	public function __construct($university)
//	{
//		$this->tshirt = new TshirtRepository($university);
//		$this->polo = new PoloRepository($university);
//		$this->bomber = new BomberRepository($university);
//		$this->hoodie = new HoodieRepository($university);
//		$this->sweatshirt = new SweatshirtRepository($university);
//	}
	
	
		public function addCart($data)
		{
			
		$cart = Cart::add ($data->id, $data->name, 1, $data->price ,  [ 'image'  => $data->image, 'size' => $data->size]);
		return $cart;

		}

	public function  addCartToBase()
	{
		$cart = Cart::content();
		$carts = explode(",", $cart);
		$cg = implode(",", $carts);
//		return $cart;
//		var_dump($cg);
		$this->model->name = 'fghfgh';
		$this->model->save();
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