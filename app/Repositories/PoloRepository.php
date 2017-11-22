<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use  App\Models\Cataloge\Poloes;

Class PoloRepository extends BaseRepository
{
	public function __construct()
	{
		parent::__construct('polo');
		$this->poloes = new Poloes();
	}

	public function onePolo($data)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$polo = $this->poloes
			->select('id', $this->clothesTypeDbRaw, 'name', 'description', 'image', 'price', 'created_at', 'stock')->with('cataloge')
			->where('id', '=', $data->id)->where('university', '=', $uniwearsity)->first();

		return $polo;
	}


	public function allPolo($size = false)
	{
		$uniwearsity = $this->getUniversityFromUrl();

		$polos = $this->poloes
			->select('poloes.id', $this->clothesTypeDbRaw, 'poloes.name', 'description', 'image', 'price', 'created_at', 'stock');
		
		if ((int)$size) {
			$polos = $polos->join('sizes_polo', 'poloes.id','=', 'sizes_polo.id')
				->where('sizes_polo.size_id', '=', $size);
		};
		
		$polos = $polos->where('university', '=', $uniwearsity)->latest()->simplePaginate(12);

		return $polos;


	}

	private function getUniversityFromUrl()
	{
		$url_parts = explode('/', $_SERVER['REQUEST_URI']);
		return $url_parts[1];
	}
	
	
}