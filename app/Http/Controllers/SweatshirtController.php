<?php

namespace App\Http\Controllers;


use App\Repositories\SweatshirtRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SweatshirtController extends Controller
{
	public $sweatshirt;

	public function __construct()
	{
		$university = $this->getUniversityFromUrl();
		$this->sweatshirt = new SweatshirtRepository($university);
	}


	public function postAddSweatshirt(Request $request)
	{
		$this->sweatshirt->store($request);
//		return Redirect::to('/admin/tshirts_kpi');
		return redirect()->back()->with('message','Товар успешно добавлен');
	}


	public function getSortSweatshirt()
	{
		$sweatshirt = $this->sweatshirt->sortSweatshirt();
		return view('home/index', array('sweatshirt' => $sweatshirt));
	}


	public function getOneSweatshirt(Request $request)
	{
		$sweatshirt = $this->sweatshirt->oneSweatshirt($request);
		return view('/cataloge/sweatshirt/one', array('sweatshirt' => $sweatshirt));
	}


	public function getAllSweatshirt()
	{
		$tshirts = $this->sweatshirt->allSweatshirts();
		return view('/cataloge/cataloge', array('tshirts' => $tshirts));
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}
}
