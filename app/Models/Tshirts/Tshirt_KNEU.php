<?php

namespace App\Models\Tshirts;

use Illuminate\Database\Eloquent\Model;

class Tshirt_KNEU extends Model
{
	protected $table = 'tshirts_KNEU';
	protected $primaryKey = 'tshirt_id';
	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_tshirt_KNEU', 'tshirt_id', 'size_id');
	}
}
