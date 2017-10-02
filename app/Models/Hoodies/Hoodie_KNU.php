<?php

namespace App\Models\Hoodies;

use Illuminate\Database\Eloquent\Model;

class Hoodie_KNU extends Model
{
	protected $table = 'hoodies_KNU';
	protected $primaryKey = 'hoodie_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_hoodies_KNU', 'hoodie_id', 'size_id');
	}
}
