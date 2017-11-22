<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use  App\Models\Cataloge\Sweatshirts;
class SweatshirtRepository extends BaseRepository
{


	public function __construct()
	{
		parent::__construct('sweatshirt');
		$this->sweatshirts = new Sweatshirts();

	}


	public function oneSweatshirt($data)
	{
		$uniwearsity = $this->getUniversityFromUrl();
		
		$sweatshirt = $this->sweatshirts
			->select('id', $this->clothesTypeDbRaw, 'name', 'description', 'image', 'price', 'created_at', 'stock')->with('cataloge')
			->where('id', '=', $data->id)->where('university', '=', $uniwearsity)->first();

		return $sweatshirt;
	}


	public function allSweatshirts($size = false)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$sweatshirts = $this->sweatshirts
			->select('sweatshirts.id', $this->clothesTypeDbRaw, 'sweatshirts.name', 'description', 'image', 'price', 'created_at', 'stock');

		if ((int)$size) {
			$sweatshirts = $sweatshirts->join('sizes_sweatshirt', 'sweatshirts.id','=', 'sizes_sweatshirt.id')
				->where('sizes_sweatshirt.size_id', '=', $size);
		};

		$sweatshirts = $sweatshirts->where('university', '=', $uniwearsity)->latest()->simplePaginate(12);

		return $sweatshirts;
		
	}

	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}
	
	
}
