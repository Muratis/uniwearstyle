<?php
/**
 * Created by PhpStorm.
 * User: Muratis
 * Date: 27.09.2017
 * Time: 22:16
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

Class PoloRepository
{
	private $model;
	private $models = [
		'kpi' => 'Polo_KPI',
		'nmu' => 'Polo_NMU',
		'kneu' => 'Polo_KNEU',
		'knu' => 'Polo_KNU',
	];

	public function __construct($university)
	{
		$this->getTshirtModelByUniversity($university);

	}

	public function onePolo($data)
	{
		$polo = $this->model
			->select('polo_id', 'name', 'description', 'image', 'price')->with('cataloge')
			->where('polo_id', '=', $data->polo_id)->first();

		return $polo;
	}


	public function allPolo()
	{
		$polo = $this->model
			->select('polo_id', 'name', 'description', 'image', 'price')
			->latest()->simplePaginate(12);

		return $polo;
	}
	


	private function getTshirtModelByUniversity($university)
	{
		if (!array_key_exists($university, $this->models)) {
			abort(404);
		}

		$tshirt_model = 'App\\Models\\Polo\\' . $this->models[$university];
		$this->model = new $tshirt_model;
	}
	
}