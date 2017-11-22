<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FilterRepository;

class FilterController extends Controller
{

	protected $filter;
	
	public function __construct()
	{
		$university = $this->getUniversityFromUrl();
		$this->filter = new FilterRepository($university[1]);
	}

	public function getAllCataloge(Request $request)
	{
		$university = $this->getUniversityFromUrl();
		
		$size = null;
		if ($request->size_id) {
			$size = $request->size_id;
		}
		
		$content = $this->filter->allCatalog($size);

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