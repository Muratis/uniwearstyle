<?php

namespace App\Http\Controllers;


use App\Repositories\TshirtRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TshirtController extends Controller
{
	public $tshirt;
	
	public function __construct()
	{
		$university = $this->getUniversityFromUrl();
		$this->tshirt = new TshirtRepository($university);
	}
	
	
	public function postAddTshirt(Request $request)
	{
		$this->tshirt->store($request);
//		return Redirect::to('/admin/tshirts_kpi');
		return redirect()->back()->with('message','Товар успешно добавлен');
	}
	

	public function getSortTshirts()
	{
		$tshirts = $this->tshirt->sortTshirts();
		return view('home/index', array('$tshirts' => $tshirts));
	}
	

	public function getOneTshirt(Request $request)
	{
		$tshirt = $this->tshirt->oneTshirt($request);
		return view('/cataloge/tshirt/one', array('tshirt' => $tshirt));
	}

	
	public function getAllTshirt()
	{
		$tshirts = $this->tshirt->allTshirts();
		return view('/cataloge/cataloge', array('tshirts' => $tshirts));
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}
}
