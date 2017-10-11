<?php
namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
	public function __construct()
	{
		$this->carts = new CartRepository();

	}

	
	public function postAddCart()
	{
		$this->carts->addCartToBase();
	}

	public function postAdd(Request $request)
	{
		$this->carts->addCart($request);
		
	}


	public function getAdd() 
	{

		$carts =$this->carts->showCart();
		return view('cart/cart', array('carts' => $carts,));
			
	}
	
	public function postRemove(Request $request)
	{
		$this->carts->removeCart($request);
	}



	public function getCheckout()
	{
		$carts =$this->carts->showCart();
		return view('cart/checkout', array('carts' => $carts));
	}
	
}