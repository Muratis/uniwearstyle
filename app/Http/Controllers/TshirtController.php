<?php

namespace App\Http\Controllers;

use App\Models\Tshirt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TshirtController extends Controller
{
	public $tshirt;

	/**
	 * TshirtController constructor.
	 * @param Tshirt $tshirt
	 */

	public function __construct(Tshirt $tshirt)
	{
		$this->tshirt = $tshirt;
	}

	/**
	 * @param Request $request
	 * @return mixed
	 */

	public function postAddTshirt(Request $request)
	{
		 $this->tshirt->store($request);

		return Redirect::to('admin/tshirts');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function getSortTshirts()
	{
		$tshirts = $this->tshirt->sortTshirts();
		return view('home/index', array('$tshirts' => $tshirts));
	}

	/**
	 *
	 */

	public function getOneTshirt($tshirt_id)
	{
		$tshirt = $this->tshirt->oneTshirt()->where('tshirt_id', '=', $tshirt_id)->first();
		

		return view('/cataloge/tshirt/one', array('tshirt' => $tshirt));
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */

	public function getAllTshirt()
	{
		$tshirts = $this->tshirt->allTshirts();
		return view('home/index', array('tshirts' => $tshirts));
	}
	
}
