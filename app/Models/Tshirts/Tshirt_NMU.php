<?php

namespace App\Models\Tshirts;

use Illuminate\Database\Eloquent\Model;

class Tshirt_NMU extends Model
{
	protected $table = 'tshirts_NMU';

	protected $primaryKey = 'tshirt_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_tshirt_NMU', 'tshirt_id', 'size_id');
	}
}
