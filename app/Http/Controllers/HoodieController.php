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
		$this->hoodie = new HoodieRepository($university[1]);
	}

	
	


	public function getOneHoodie(Request $request)
	{
		$university = $this->getUniversityFromUrl();
		$item = $this->hoodie->oneHoodie($request);
		return view('/cataloge/one', array('item' => $item, 'university' => $university));
	}


	public function getAllHoodie()
	{
		$university = $this->getUniversityFromUrl();
		$content = $this->hoodie->allHoodie();
		return view('/cataloge/cataloge', array('content' => $content, 'university' => $university));
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts;
	}
}
