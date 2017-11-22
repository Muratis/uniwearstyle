<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use  App\Models\Cataloge\Tshirts;
class TshirtRepository extends BaseRepository
{
	public function __construct()
	{
		parent::__construct('tshirt');
		$this->tshirts = new Tshirts();


	}


	public function oneTshirt($data)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$tshirt = $this->tshirts
			->select('id', $this->clothesTypeDbRaw, 'name', 'description', 'image', 'price', 'created_at', 'stock')->with('cataloge')
			->where('id', '=', $data->id)->where('university', '=', $uniwearsity)->first();

		return $tshirt;
	}


	public function allTshirts($size = false)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$tshirts = $this->tshirts
			->select('tshirts.id', $this->clothesTypeDbRaw, 'tshirts.name', 'description', 'image', 'price', 'created_at', 'stock');

		if ((int)$size) {
		$tshirts = $tshirts->join('sizes_tshirt', 'tshirts.id','=', 'sizes_tshirt.id')
				->where('sizes_tshirt.size_id', '=', $size);
		};

		$tshirts = $tshirts->where('university', '=', $uniwearsity)->latest()->simplePaginate(12);

		return $tshirts;

	}

	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}
	
}