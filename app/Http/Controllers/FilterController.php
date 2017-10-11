<?php

namespace App\Http\Controllers;

use App\Repositories\FilterRepository;

class FilterController extends Controller
{

	protected $filter;
	
	public function __construct()
	{
		$university = $this->getUniversityFromUrl();
		$this->filter = new FilterRepository($university[1]);
	}

//	public function getAllCataloge()
//	{
//		$university = $this->getUniversityFromUrl();
//		$content = $this->filter->allCatalog();
////		var_dump($content);
//		return view('/cataloge/cataloge', array('content' => $content, 'university' => $university));
//	}
	
	
	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts;
	}
	
}