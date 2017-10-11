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
		$this->sweatshirt = new SweatshirtRepository($university[1]);
	}
	




	public function getOneSweatshirt(Request $request)
	{
		$university = $this->getUniversityFromUrl();
		$item = $this->sweatshirt->oneSweatshirt($request);
		return view('/cataloge/one', array('item' => $item, 'university' => $university));
	}


	public function getAllSweatshirt()
	{
		$university = $this->getUniversityFromUrl();
		$content = $this->sweatshirt->allSweatshirts();
		return view('/cataloge/cataloge', array('content' => $content, 'university' => $university));
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts;
	}
}
