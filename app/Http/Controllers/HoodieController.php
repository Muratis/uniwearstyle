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


	public function getAllHoodie(Request $request)
	{
		$university = $this->getUniversityFromUrl();

		$size = null;
		if ($request->size_id) {
			$size = $request->size_id;
		}

		$content = $this->hoodie->allHoodie($size);
		
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
