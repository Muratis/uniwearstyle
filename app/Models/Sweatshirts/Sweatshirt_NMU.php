<?php

namespace App\Models\Sweatshirts;

use Illuminate\Database\Eloquent\Model;

class Sweatshirt_NMU extends Model
{
	protected $table = 'sweatshirts_NMU';
	protected $primaryKey = 'sweatshirt_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_sweatshirts_NMU', 'sweatshirt_id', 'size_id');
	}
}
