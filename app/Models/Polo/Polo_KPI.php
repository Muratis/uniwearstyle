<?php

namespace App\Models\Polo;

use Illuminate\Database\Eloquent\Model;

class Polo_KPI extends Model
{
	protected $table = 'polo_KPI';
	protected $primaryKey = 'polo_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_polo_KPI', 'polo_id', 'size_id');
	}
}
