<?php

namespace App\Models\Sweatshirts;

use Illuminate\Database\Eloquent\Model;

class Sweatshirt_KPI extends Model
{
	protected $table = 'sweatshirts_KPI';
	protected $primaryKey = 'sweatshirt_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_sweatshirts_KPI', 'sweatshirt_id', 'size_id');
	}
}
