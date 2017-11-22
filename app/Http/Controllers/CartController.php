<?php
namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
	public function __construct(CartRepository $cartRepository)
	{
		$this->carts = $cartRepository;
	}

	
	public function postAddCart(Request $request)
	{
		$this->carts->addCartToBase($request);

		return redirect()->route('complete_shop');
	}

	public function getShoppingComplete()
	{
		return view('cart/shopping_complete');
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
		$carts = $this->carts->showCart();
		return view('cart/checkout', array('carts' => $carts));
	}
	
	public function postMethod(Request $request)
	{
		return $this->carts->methodShoping($request);

	}
	
	
	public function getOrderForAdmin()
	{
		$id_order = $this->getOrderFromUrl();

		return view('/cart/admin/oneOrder', array( 'id' => $id_order[2]));
	}





	private function getOrderFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts;
	}

}