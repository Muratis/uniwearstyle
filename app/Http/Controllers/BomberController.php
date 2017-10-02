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
		$this->bomber = new BomberRepository($university);
	}
	
	


	public function getOneBomber(Request $request)
	{
		$bomber = $this->bomber->oneBomber($request);
		return view('/cataloge/tshirt/one', array('bomber' => $bomber));
	}


	public function getAllBomber()
	{
		$bombers = $this->bomber->allBombers();
		return view('/cataloge/cataloge', array('bombers' => $bombers));
	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}
}
