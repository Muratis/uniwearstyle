<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	//Покажи главную страницу
	public function getIndex()
	{
		return view('home/index');
	}

	public function getIndexUniwear()
	{
		$university = $this->getUniversityFromUrl();
		return view('home/indexUniwear', array('university' => $university));
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts;
	}
	
}
