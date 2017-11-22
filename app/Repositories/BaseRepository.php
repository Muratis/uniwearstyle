<?php
/**
 * Created by PhpStorm.
 * User: Muratis
 * Date: 18.11.2017
 * Time: 17:28
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;


abstract class BaseRepository
{
	protected $clothesTypeDbRaw;
	
	private $clothesTypes = [
		'tshirt',
		'polo',
		'bomber',
		'hoodie',
		'sweatshirt',
	];
	
	public function __construct($type)
	{
		$this->clothesTypeDbRaw = $this->getClothesType($type); 
	}

	private function getClothesType($type)
	{
		if (!in_array($type, $this->clothesTypes)) {
			abort(404);
		}
		
		return DB::raw("'" . $type . "' as type");
	}
}