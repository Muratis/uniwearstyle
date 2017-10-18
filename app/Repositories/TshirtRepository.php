<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

class TshirtRepository
{
	private $model;
	private $models = [
		'kpi' => 'Tshirt_KPI',
		'nmu' => 'Tshirt_NMU',
		'kneu' => 'Tshirt_KNEU',
		'knu' => 'Tshirt_KNU',
	];

	public function __construct($university)
	{
		$this->getTshirtModelByUniversity($university);

	}


	public function oneTshirt($data)
	{
		$tshirt = $this->model
			->select('tshirt_id', 'name', 'description', 'image', 'price', 'created_at')->with('cataloge')
			->where('tshirt_id', '=', $data->tshirt_id)->first();

		return $tshirt;
	}


	public function allTshirts()
	{
		$tshirts = $this->model
			->select('tshirt_id', 'name', 'description', 'image', 'price', 'created_at')
			->latest()->simplePaginate(12);

		return $tshirts;
	}





	private function getTshirtModelByUniversity($university)
	{
		if (!array_key_exists($university, $this->models)) {
			abort(404);
		}

		$tshirt_model = 'App\\Models\\Tshirts\\' . $this->models[$university];
		$this->model = new $tshirt_model;
	}
}