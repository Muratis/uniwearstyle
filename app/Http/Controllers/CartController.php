<?php
namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Tshirt;
use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{

	public function __construct(Carts $carts, Tshirt $tshirt)
	{
		$this->carts = $carts;
 		$this->tshirt = $tshirt;
	}
	


	public function postAdd(Request $request)
	{
		$this->carts->addCart($request);
		
	}

		public function getAdd() {
			$carts =$this->carts->showCart();
		return view('cart/cart', array('carts' => $carts,));
			
	}
	
	public function postRemove(Request $request)
	{
		$this->carts->removeCart($request);
	}

}