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
			->select('hoodie_id', 'name', 'description', 'image', 'price')
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


	public function store($data)
	{
		//Добавление новости, если не получаеться, то выдает ошибку!
		try {
			DB::beginTransaction();
			$this->saveHoodie($data);
			$this->saveSizes($data);
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			abort(503);
		}
	}


	protected function saveHoodie($data)
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

		$tshirt_model = 'App\\Models\\Hoodies\\' . $this->models[$university];
		$this->model = new $tshirt_model;
	}

}