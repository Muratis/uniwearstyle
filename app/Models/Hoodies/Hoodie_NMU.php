<?php

namespace App\Models\Hoodies;

use Illuminate\Database\Eloquent\Model;

class Hoodie_NMU extends Model
{
	protected $table = 'hoodies_NMU';
	protected $primaryKey = 'hoodie_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_hoodies_NMU', 'hoodie_id', 'size_id');
	}
}
