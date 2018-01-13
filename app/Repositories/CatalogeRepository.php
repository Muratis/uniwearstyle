<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Models\Sizes;
use  App\Models\Cataloge;

class CatalogeRepository
{
	public function __construct()
	{
		$this->size = new Sizes();
		$this->cataloge = new Cataloge();
	}

	public function allCatalog($size = false)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$tshirts = $this->cataloge
			->select('cataloge.id', 'clothes_type', 'cataloge.name', 'description', 'image', 'price', 'stock', 'gender');

		if ((int)$size) {
			$tshirts = $tshirts->join('sizes_cataloge', 'cataloge.id','=', 'sizes_cataloge.id')
				->where('sizes_cataloge.size_id', '=', $size);
		};


		$tshirts = $tshirts->where('university', '=', $uniwearsity)->latest()->simplePaginate(12);

		return $tshirts;
	}

	public function oneItemCataloge($data)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$item = $this->cataloge
			->select('id', 'clothes_type', 'name', 'description', 'image', 'price', 'stock', 'gender')->with('cataloge_sizes')
			->where('id', '=', $data->id)->where('university', '=', $uniwearsity)->first();

		return $item;
	}

	public function allTshirts($size = false)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$tshirts = $this->cataloge
			->select('cataloge.id', 'clothes_type', 'cataloge.name', 'description', 'image', 'price', 'stock', 'gender');

		if ((int)$size) {
			$tshirts = $tshirts->join('sizes_cataloge', 'cataloge.id','=', 'sizes_cataloge.id')
				->where('sizes_cataloge.size_id', '=', $size);
		};


		$tshirts = $tshirts->where('university', '=', $uniwearsity)->where('clothes_type', '=', 'tshirt')->latest()->simplePaginate(12);

		return $tshirts;
	}

	public function allPolos($size = false)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$polos = $this->cataloge
			->select('cataloge.id', 'clothes_type', 'cataloge.name', 'description', 'image', 'price', 'stock', 'gender');

		if ((int)$size) {
			$polos = $polos->join('sizes_cataloge', 'cataloge.id','=', 'sizes_cataloge.id')
				->where('sizes_cataloge.size_id', '=', $size);
		};


		$polos = $polos->where('university', '=', $uniwearsity)->where('clothes_type', '=', 'polo')->latest()->simplePaginate(12);

		return $polos;
	}

	public function allSweatshirts($size = false)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$sweatshirts = $this->cataloge
			->select('cataloge.id', 'clothes_type', 'cataloge.name', 'description', 'image', 'price', 'stock', 'gender');

		if ((int)$size) {
			$sweatshirts = $sweatshirts->join('sizes_cataloge', 'cataloge.id','=', 'sizes_cataloge.id')
				->where('sizes_cataloge.size_id', '=', $size);
		};


		$sweatshirts = $sweatshirts->where('university', '=', $uniwearsity)->where('clothes_type', '=', 'sweatshirt')->latest()->simplePaginate(12);

		return $sweatshirts;
	}

	public function allBombers($size = false)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$bombers = $this->cataloge
			->select('cataloge.id', 'clothes_type', 'cataloge.name', 'description', 'image', 'price', 'stock', 'gender');

		if ((int)$size) {
			$bombers = $bombers->join('sizes_cataloge', 'cataloge.id','=', 'sizes_cataloge.id')
				->where('sizes_cataloge.size_id', '=', $size);
		};
		
		$bombers = $bombers->where('university', '=', $uniwearsity)->where('clothes_type', '=', 'bomber')->latest()->simplePaginate(12);

		return $bombers;
	}

	public function getSizeFilter()
	{
		$sizes = $this->size->select('size_id', 'name')->latest()->get();
		return $sizes;
	}

	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}

}