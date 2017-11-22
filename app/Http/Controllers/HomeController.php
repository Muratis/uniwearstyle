<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	
	

	//Покажи главную страницу
	public function getIndex()
	{
		return view('home/index');
	}


	public function getContactUs()
	{
		return view('/services/contact-us');
	}

	public function getCustomer()
	{
		return view('/services/customer');
	}

	public function getPrivacy()
	{
		return view('/services/privacy-policy');
	}

	public function getReturn()
	{
		return view('/services/return-policy');
	}
	
	
}
