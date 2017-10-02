<?php

namespace App\Models\Hoodies;

use Illuminate\Database\Eloquent\Model;

class Hoodie_KNEU extends Model
{
	protected $table = 'hoodies_KNEU';
	protected $primaryKey = 'hoodie_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_hoodies_KNEU', 'hoodie_id', 'size_id');
	}
}
