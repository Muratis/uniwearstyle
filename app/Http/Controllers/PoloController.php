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

		$this->polo = new PoloRepository($university[1]);
	}

	


	public function getOnePolo(Request $request)
	{
		$university = $this->getUniversityFromUrl();
		$item = $this->polo->onePolo($request);
		return view('/cataloge/one', array('item' => $item, 'university' => $university[1]));
	}


	public function getAllPolo()
	{
		$university = $this->getUniversityFromUrl();
		$content = $this->polo->allPolo();
		return view('/cataloge/cataloge', array('content' => $content, 'university' => $university));
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts;
	}
}
