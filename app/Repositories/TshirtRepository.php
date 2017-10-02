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
			->select('tshirt_id', 'name', 'description', 'image', 'price')
			->where('tshirt_id', '=', $data->tshirt_id)->first();

		return $tshirt;
	}


	public function allTshirts()
	{
		$tshirts = $this->model
			->select('tshirt_id', 'name', 'description', 'image', 'price')
			->latest()->simplePaginate(12);

		return $tshirts;
	}


	public function store($data)
	{
		//Добавление новости, если не получаеться, то выдает ошибку!
		try {
			DB::beginTransaction();
			$this->saveTshirt($data);
			$this->saveSizes($data);
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			abort(503);
		}
	}


	protected function saveTshirt($data)
	{
		$this->model->name = $data->name;
		$this->model->description = $data->description;
		$this->model->price = $data->price;
		$this->model->image = $data->image;
		$this->model->save();
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

		$tshirt_model = 'App\\Models\\Tshirts\\' . $this->models[$university];
		$this->model = new $tshirt_model;
	}
}