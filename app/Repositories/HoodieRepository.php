<?php
/**
 * Created by PhpStorm.
 * User: Muratis
 * Date: 27.09.2017
 * Time: 22:16
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

Class HoodieRepository
{
	private $model;
	private $models = [
		'kpi' => 'Hoodie_KPI',
		'nmu' => 'Hoodie_NMU',
		'kneu' => 'Hoodie_KNEU',
		'knu' => 'Hoodie_KNU',
	];

	public function __construct($university)
	{
		$this->getTshirtModelByUniversity($university);

	}

	public function oneHoodie($data)
	{
		$polo = $this->model
			->select('hoodie_id', 'name', 'description', 'image', 'price')->with('cataloge')
			->where('hoodie_id', '=', $data->hoodie_id)->first();

		return $polo;
	}


	public function allHoodie()
	{
		$hoodie = $this->model
			->select('hoodie_id', 'name', 'description', 'image', 'price')
			->latest()->simplePaginate(12);

		return $hoodie;
	}
	
	
	

	private function getTshirtModelByUniversity($university)
	{
		if (!array_key_exists($university, $this->models)) {
			abort(404);
		}

		$tshirt_model = 'App\\Models\\Hoodies\\' . $this->models[$university];
		$this->model = new $tshirt_model;
	}

}