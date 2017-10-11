<?php
/**
 * Created by PhpStorm.
 * User: Muratis
 * Date: 28.09.2017
 * Time: 17:11
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

class SweatshirtRepository
{
	private $model;
	private $models = [
		'kpi' => 'Sweatshirt_KPI',
		'nmu' => 'Sweatshirt_NMU',
		'kneu' => 'Sweatshirt_KNEU',
		'knu' => 'Sweatshirt_KNU',
	];

	public function __construct($university)
	{
		$this->getTshirtModelByUniversity($university);

	}

	public function oneSweatshirt($data)
	{
		$sweatshirt = $this->model
			->select('sweatshirt_id', 'name', 'description', 'image', 'price')->with('cataloge')
			->where('sweatshirt_id', '=', $data->sweatshirt_id)->first();

		return $sweatshirt;
	}

	public function allSweatshirts()
	{
		$sweatshirt = $this->model
			->select('sweatshirt_id', 'name', 'description', 'image', 'price')
			->latest()->simplePaginate(12);

		return $sweatshirt;
	}
	
	public function allSweatshirtsForFilter()
	{
		$sweatshirt = $this->model
			->select('sweatshirt_id', 'name', 'description', 'image', 'price');
		
		return $sweatshirt;
	}

	public function store($data)
	{
		//Добавление новости, если не получаеться, то выдает ошибку!
		try {
			DB::beginTransaction();
			$this->saveSweatshirt($data);
			$this->saveSizes($data);
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			abort(503);
		}
	}


	protected function saveSweatshirt($data)
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

		$tshirt_model = 'App\\Models\\Sweatshirts\\' . $this->models[$university];
		$this->model = new $tshirt_model;
	}


}