<?php

namespace App\Http\Controllers;

use App\Repositories\DispatchRepository;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
	public function __construct()
	{
		$this->dispatch= new DispatchRepository();
	}

	public function PostEmailForDispatch(Request $request)
	{
		$add = $this->dispatch->AddEmailForDispatch($request);
		return $add;
	}
}