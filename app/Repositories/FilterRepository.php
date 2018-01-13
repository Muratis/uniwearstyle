<?php
namespace App\Repositories;

use  Illuminate\Support\Facades\DB;
use App\Models\Sizes;
use App\Repositories\BomberRepository;
use App\Repositories\TshirtRepository;
use App\Repositories\HoodieRepository;
use App\Repositories\PoloRepository;
use App\Repositories\SweatshirtRepository;

class FilterRepository extends BaseRepository
{
	protected $tshirt;
	protected $polo;
	protected $hoodie;
	protected $sweatshirt;
	protected $bomber;

	public function __construct()
	{
		$this->size = new Sizes();
		$this->tshirt = new TshirtRepository();
		$this->polo = new PoloRepository();
		$this->hoodie = new HoodieRepository();
		$this->bomber = new BomberRepository();
		$this->sweatshirt = new SweatshirtRepository();
	}

	public function  allCatalog($size = false)
	{
		$cataloge = DB::table('tshirts')
			->union(DB::table('poloes'))
			->union(DB::table('bombers'))
			->union(DB::table('sweatshirts'))
			->union(DB::table('hoodies'))->get();

		return $cataloge;
	}

	public function allCatalog_old($size = false)
	{
		$tshirtsData = $this->tshirt->allTshirts($size);
		$polosData = $this->polo->allPolo($size);
		$hoodiesData = $this->hoodie->allHoodie($size);
		$bombersData = $this->bomber->allBombers($size);
		$sweatshirtsData = $this->sweatshirt->allSweatshirts($size);

//		var_dump(get_class_methods($tshirtsData));die;

		$tshirts = [];
		$polos = [];
		$bombers = [];
		$hoodies = [];
		$sweatshirts = [];

		foreach ($tshirtsData as $one) {
			$key = (string)$one->created_at;
			$tshirts[$key] = $one;
		}

		foreach ($polosData as $one) {
			$key = (string)$one->created_at;
			$polos[$key] = $one;
		}

		foreach ($bombersData as $one) {
			$key = (string)$one->created_at;
			$bombers[$key] = $one;
		}

		foreach ($hoodiesData as $one) {
			$key = (string)$one->created_at;
			$hoodies[$key] = $one;
		}

		foreach ($sweatshirtsData as $one) {
			$key = (string)$one->created_at;
			$sweatshirts[$key] = $one;
		}



		$all = array_merge($tshirts, $polos, $bombers, $hoodies, $sweatshirts);
		krsort($all);

		var_dump(count($all));die;
		return $all;
	}

	public function getSizeFilter()
	{
		$sizes = $this->size->select('size_id', 'name')->latest()->get();
		return $sizes;
	}


}
