<?php

namespace App\Models\Polo;

use Illuminate\Database\Eloquent\Model;

class Polo_NMU extends Model
{
	protected $table = 'polo_NMU';
	protected $primaryKey = 'polo_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_polo_NMU', 'polo_id', 'size_id');
	}
}
