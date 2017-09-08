<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
	protected $primaryKey = 'size_id';
	
	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Tshirt', 'size_tshirt', 'tshirt_id', 'size_id');
	}
	
}
