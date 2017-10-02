<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;

class BomberRepository
{
	private $model;
	private $models = [
		'kpi' => 'Bomber_KPI',
		'nmu' => 'Bomber_NMU',
		'kneu' => 'Bomber_KNEU',
		'knu' => 'Bomber_KNU',
	];

	public function __construct($university)
	{
		$this->getTshirtModelByUniversity($university);

	}


	public function oneBomber($data)
	{
		$bomber = $this->model
			->select('bomber_id', 'name', 'description', 'image', 'price')
			->where('bomber_id', '=', $data->bomber_id)->first();

		return $bomber;
	}


	public function allBombers()
	{
		$bombers = $this->model
			->select('bomber_id', 'name', 'description', 'image', 'price')
			->latest()->simplePaginate(12);

		return $bombers;
	}


	public function store($data)
	{
		//Добавление новости, если не получаеться, то выдает ошибку!
		try {
			DB::beginTransaction();
			$this->saveBomber($data);
			$this->saveSizes($data);
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			abort(503);
		}
	}



	protected function saveSizes($data)
	{
		$this->model->cataloge()->attach($data->sizes);
	}


	private function getTshirtModelByUniversity($university)
	{
		if (!array_key_exists($university, $this->models)) {
			abort(404);
		}

		$tshirt_model = 'App\\Models\\Bombers\\' . $this->models[$university];
		$this->model = new $tshirt_model;
	}
}