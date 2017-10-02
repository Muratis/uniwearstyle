<?php

namespace App\Http\Controllers;


use App\Repositories\HoodieRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HoodieController extends Controller
{
	public $hoodie;

	public function __construct()
	{
		$university = $this->getUniversityFromUrl();
		$this->hoodie = new HoodieRepository($university);
	}


	public function postAddHoodie(Request $request)
	{
		$this->hoodie->store($request);
//		return Redirect::to('/admin/tshirts_kpi');
		return redirect()->back()->with('message','Товар успешно добавлен');
	}


	public function getSortHoodie()
	{
		$hoodie = $this->hoodie->sortHoodie();
		return view('home/index', array('hoodie' => $hoodie));
	}


	public function getOneHoodie(Request $request)
	{
		$hoodie = $this->hoodie->oneHoodie($request);
		return view('/cataloge/tshirt/one', array('hoodie' => $hoodie));
	}


	public function getAllHoodie()
	{
		$tshirts = $this->hoodie->allHoodie();
		return view('/cataloge/cataloge', array('tshirts' => $tshirts));
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}
}
