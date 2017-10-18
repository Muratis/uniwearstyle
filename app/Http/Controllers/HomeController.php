<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	
	

	//Покажи главную страницу
	public function getIndex()
	{
		$university = '/';
		return view('home/index');
	}
	
	
}
