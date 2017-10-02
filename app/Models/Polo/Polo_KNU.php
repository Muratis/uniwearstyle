<?php

namespace App\Models\Polo;

use Illuminate\Database\Eloquent\Model;

class Polo_KNU extends Model
{
	protected $table = 'polo_KNU';
	protected $primaryKey = 'polo_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_polo_KNU', 'polo_id', 'size_id');
	}
}
