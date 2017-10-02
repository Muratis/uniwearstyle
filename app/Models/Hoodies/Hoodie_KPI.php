<?php

namespace App\Models\Hoodies;

use Illuminate\Database\Eloquent\Model;

class Hoodie_KPI extends Model
{
	protected $table = 'hoodies_KPI';
	protected $primaryKey = 'hoodie_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_hoodies_KPI', 'hoodie_id', 'size_id');
	}
}
