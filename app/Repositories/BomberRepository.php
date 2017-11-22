<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use  App\Models\Cataloge\Bombers;

class BomberRepository extends BaseRepository
{


	public function __construct()
	{
		parent::__construct('bomber');
		$this->bombers = new Bombers();

	}


	public function oneBomber($data)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$bomber = $this->bombers
			->select('id', $this->clothesTypeDbRaw, 'name', 'description', 'image', 'price', 'stock')->with('cataloge')
			->where('id', '=', $data->id)->where('university', '=', $uniwearsity)->first();

		return $bomber;
	}


	public function allBombers($size = false)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$bombers = $this->bombers
			->select('bombers.id', $this->clothesTypeDbRaw, 'bombers.name', 'description', 'image', 'price', 'created_at', 'stock');

		if ((int)$size) {
			$bombers = $bombers->join('sizes_bomber', 'bombers.id','=', 'sizes_bomber.id')
				->where('sizes_bomber.size_id', '=', $size);
		};

		$bombers = $bombers->where('university', '=', $uniwearsity)->latest()->simplePaginate(12);

		return $bombers;


	}


	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}

}