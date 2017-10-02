<?php

namespace App\Http\Controllers;


use App\Repositories\PoloRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PoloController extends Controller
{
	public $polo;

	public function __construct()
	{
		$university = $this->getUniversityFromUrl();
		$this->polo = new PoloRepository($university);
	}


	public function postAddPolo(Request $request)
	{
		$this->polo->store($request);
//		return Redirect::to('/admin/tshirts_kpi');
		return redirect()->back()->with('message','Товар успешно добавлен');
	}


	public function getSortPolo()
	{
		$polo = $this->polo->sortTshirts();
		return view('home/index', array('polo' => $polo));
	}


	public function getOnePolo(Request $request)
	{
		$polo = $this->polo->onePolo($request);
		return view('/cataloge/polo/one', array('polo' => $polo));
	}


	public function getAllPolo()
	{
		$tshirts = $this->polo->allPolo();
		return view('/cataloge/cataloge', array('tshirts' => $tshirts));
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}
}
