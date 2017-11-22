<?php
/**
 * Created by PhpStorm.
 * User: Muratis
 * Date: 27.09.2017
 * Time: 22:16
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Models\Cataloge\Hoodies;

Class HoodieRepository extends BaseRepository
{


	public function __construct()
	{
		parent::__construct('hoodie');
		$this->hoodies = new Hoodies();
	}

	public function oneHoodie($data)
	{
		$uniwearsity = $this->getUniversityFromUrl();
		
		$polo = $this->hoodies
			->select('id',$this->clothesTypeDbRaw, 'name', 'description', 'image', 'price', 'stock')->with('cataloge')
			->where('id', '=', $data->id)->where('university', '=', $uniwearsity)->first();

		return $polo;
	}


	public function allHoodie($size = false)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$hoodies = $this->hoodies
			->select('hoodies.id', $this->clothesTypeDbRaw, 'hoodies.name', 'description', 'image', 'price', 'created_at', 'stock');

		if ((int)$size) {
			$hoodies = $hoodies->join('sizes_hoodie', 'hoodies.id','=', 'sizes_hoodie.id')
				->where('sizes_hoodie.size_id', '=', $size);
		};

		$hoodies = $hoodies->where('university', '=', $uniwearsity)->latest()->simplePaginate(12);

		return $hoodies;


	}

	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}

}