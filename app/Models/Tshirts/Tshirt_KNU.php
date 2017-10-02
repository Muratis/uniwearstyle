<?php

namespace App\Models\Tshirts;

use Illuminate\Database\Eloquent\Model;

class Tshirt_KNU extends Model
{
	protected $table = 'tshirts_KNU';

	protected $primaryKey = 'tshirt_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_tshirt_KNU', 'tshirt_id', 'size_id');
	}
}
