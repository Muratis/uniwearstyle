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
			->select('polo_id', 'name', 'description', 'image', 'price')
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


	public function store($data)
	{
		//Добавление новости, если не получаеться, то выдает ошибку!
		try {
			DB::beginTransaction();
			$this->savePolo($data);
			$this->saveSizes($data);
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			abort(503);
		}
	}


	protected function savePolo($data)
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

		$tshirt_model = 'App\\Models\\Polo\\' . $this->models[$university];
		$this->model = new $tshirt_model;
	}
	
}