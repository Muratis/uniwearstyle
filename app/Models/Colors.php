<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
	public function colorTshirt()
	{
		return $this->belongsToMany('App\Models\Tshirt');
	}


}