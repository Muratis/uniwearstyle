<?php

namespace App\Models\Polo;

use Illuminate\Database\Eloquent\Model;

class Polo_KNEU extends Model
{
	protected $table = 'polo_KNEU';
	protected $primaryKey = 'polo_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_polo_KNEU', 'polo_id', 'size_id');
	}
}
