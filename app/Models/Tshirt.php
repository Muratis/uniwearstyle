<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Tshirt extends Model
{
	protected $table = 'tshirts';
	protected $primaryKey = 'tshirt_id';

//	public function colorTshirt()
//	{
//		return $this->belongsToMany('App\Models\Colors');
//	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_tshirt', 'tshirt_id', 'size_id');
	}

	/**
	 * @return mixed
	 */

	public function sortTshirts()
	{
		$sortTshirts = DB::table('tshirts') ->cataloge()->select('name', 'description', 'image', 'price')
			->where('size_tshirt.tshirt_id', '=', '1');

		return $sortTshirts;
	}

	/**
	 * @param $tshirt_id
	 * @return mixed
	 */
	
	public function oneTshirt()
	{
		$tshirt = DB::table('tshirts')->select('tshirt_id', 'name', 'description', 'image', 'price');

		return $tshirt;
	}

	/**
	 * @return mixed
	 */

	public function allTshirts()
	{
		$tshirts = DB::table('tshirts')->select('tshirt_id', 'name', 'description', 'image', 'price')
		->latest()->simplePaginate(12);

		return $tshirts;
	}


	/**
	 * @param $data
	 */

	public function store($data)
	{
		//Добавление новости, если не получаеться, то выдает ошибку!

		try {
			DB::beginTransaction();
//			$this->saveSizes($data);
			$this->saveTshirt($data);
			$this->saveSizes($data);
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			abort(503);
		}
	}

	/**
	 * @param $data
	 */

	protected function saveTshirt($data)
	{
		$this->name = $data->name;
		$this->description = $data->description;
		$this->price = $data->price;
		$this->image = $data->image;
		$this->save();
	}


	protected function saveSizes($data)
	{
		$this->cataloge()->attach($data->sizes);
	}



}
