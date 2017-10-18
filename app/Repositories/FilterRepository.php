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

	public function __construct($university)
	{
		$this->tshirt = new TshirtRepository($university);
		$this->polo = new PoloRepository($university);
		$this->hoodie = new HoodieRepository($university);
		$this->bomber = new BomberRepository($university);
		$this->sweatshirt = new SweatshirtRepository($university);
	}

	public function allCatalog()
	{
		$tshirtsData = $this->tshirt->allTshirts();
		$polosData = $this->polo->allPolo();
//		$hoodiesData = $this->hoodie->allHoodie();

		foreach ($tshirtsData as $one) {
			$key = (string)$one->created_at;
			$tshirts[$key] = $one;
		}

		foreach ($polosData as $one) {
			$key = (string)$one->created_at;
			$polos[$key] = $one;
		}

		$all = array_merge($tshirts, $polos);
		krsort($all);


		return $all;
	}

	public function getAllCatalog()
	{
			
	}

}
