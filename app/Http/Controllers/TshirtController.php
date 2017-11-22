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
		$this->tshirt = new TshirtRepository();
	}
	
	

	public function getOneTshirt(Request $request)
	{
		$university = $this->getUniversityFromUrl();
		$item = $this->tshirt->oneTshirt($request);
		return view('/cataloge/one', array('item' => $item, 'university' => $university));
	}

	
	public function getAllTshirt(Request $request)
	{
		$university = $this->getUniversityFromUrl();
		
		$size = null;
		if ($request->size_id) {
			$size = $request->size_id;
		}
		
		$content = $this->tshirt->allTshirts($size);
		
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
