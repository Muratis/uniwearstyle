<?php

namespace App\Models\Sweatshirts;

use Illuminate\Database\Eloquent\Model;

class Sweatshirt_KNU extends Model
{
	protected $table = 'sweatshirts_KNU';
	protected $primaryKey = 'sweatshirt_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_sweatshirts_KNU', 'sweatshirt_id', 'size_id');
	}
}
