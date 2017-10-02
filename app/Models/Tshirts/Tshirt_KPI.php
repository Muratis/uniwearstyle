<?php

namespace App\Models\Tshirts;

use Illuminate\Database\Eloquent\Model;

class Tshirt_KPI extends Model
{
	protected $table = 'tshirts_KPI';
	protected $primaryKey = 'tshirt_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_tshirt_KPI', 'tshirt_id', 'size_id');
	}
}
