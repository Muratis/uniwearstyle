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
use LisDev\Delivery\NovaPoshtaApi2;

class CartRepository 
{

	public function __construct()
	{
		$this->cart = new Carts();
		$this->byers = new shoppingUsers();

	}

	public function addCart($data)
	{
		$cart = Cart::add ($data->id, $data->name, 1, $data->price ,  [ 'image'  => $data->image, 'size' => $data->size, 'gender' => $data->gender]);
		return $cart;
	}

	public function addCartToBase($data)
	{
		Cart::store($data->id);

		

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

		$restore = Cart::restore($id);
		return $restore;
	}
	

	public function showCart()
	{
		return Cart::content();

	}

	public function nvPost($data) {
		$np = new NovaPoshtaApi2(
			'7ba897ef2759418c79501fb2f4b55526'
		);

		$city = $np->getCity('Киев');
		$result = $np->getWarehouses($city);

		return $result;

//		$result = $np
//			->model('Address')
//			->method('getCities')
//			->params(array(
//				"FindByString" => "Вишневое"
//
//			))
//			->execute();
//
//		$result2 = $np
//			->model('Address')
//			->method('getWarehouses')
//			->params(array(
//				"CityRef" => '38263fa1-b23e-11de-8bdf-000c2965ae0e'
//
//			))
//			->execute();
//		foreach ($result as $city) {
//			var_dump($city);
//		}
//		return $result[6];
	}

	public function removeCart($data)
	{

		$remove = Cart::remove($data->rowId);
		return $remove;

	}

	public function getCountOrders()
	{
		$count = $this->byers->select('user_id')->where('is_active', '=', '0')->count();

		return $count;
	}

		
}