<?php

namespace App\Http\Controllers;


use App\Repositories\BomberRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BomberController extends Controller
{
	public $bomber;

	public function __construct()
	{
		$university = $this->getUniversityFromUrl();
		$this->bomber = new BomberRepository($university[1]);
	}
	
	


	public function getOneBomber(Request $request)
	{
		$university = $this->getUniversityFromUrl();
		$item = $this->bomber->oneBomber($request);
		return view('/cataloge/one', array('item' => $item, 'university' => $university));
	}


	public function getAllBombers(Request $request)
	{
		$university = $this->getUniversityFromUrl();

		$size = null;
		if ($request->size_id) {
			$size = $request->size_id;
		}

		$content = $this->bomber->allBombers($size);
		
		if ($request->ajax()) {
			return view('/cataloge/preview/widget_item', array('content' => $content, 'university' => $university));
		} else {
			return view('/cataloge/cataloge', array('content' => $content, 'university' => $university));
		}
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts;
	}
}
