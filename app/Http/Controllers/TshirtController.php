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
		$this->tshirt = new TshirtRepository($university[1]);
	}
	
	

	public function getOneTshirt(Request $request)
	{
		$university = $this->getUniversityFromUrl();
		$item = $this->tshirt->oneTshirt($request);
		return view('/cataloge/one', array('item' => $item, 'university' => $university));
	}

	
	public function getAllTshirt()
	{
		$university = $this->getUniversityFromUrl();
		$content = $this->tshirt->allTshirts();
		return view('/cataloge/cataloge', array('content' => $content, 'university' => $university));
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts;
	}
}
