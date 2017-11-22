<?php

namespace App\Repositories;

use  Illuminate\Support\Facades\DB;
use App\Repositories\BomberRepository;
use App\Repositories\TshirtRepository;
use App\Repositories\HoodieRepository;
use App\Repositories\PoloRepository;
use App\Repositories\SweatshirtRepository;

Class FilterRepository
{

	protected $tshirt;
	protected $polo;
	protected $hoodie;
	protected $sweatshirt;
	protected $bomber;

	public function __construct()
	{
		$this->tshirt = new TshirtRepository();
		$this->polo = new PoloRepository();
		$this->hoodie = new HoodieRepository();
		$this->bomber = new BomberRepository();
		$this->sweatshirt = new SweatshirtRepository();
	}

	public function allCatalog($size = false)
	{
		$tshirtsData = $this->tshirt->allTshirts($size);
		$polosData = $this->polo->allPolo($size);
		$hoodiesData = $this->hoodie->allHoodie($size);
		$bombersData = $this->bomber->allBombers($size);
		$sweatshirtsData = $this->sweatshirt->allSweatshirts($size);

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


		return $all;
	}



}
