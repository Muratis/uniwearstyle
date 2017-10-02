<?php

namespace App\Models\Sweatshirts;

use Illuminate\Database\Eloquent\Model;

class Sweatshirt_KNEU extends Model
{
	protected $table = 'sweatshirts_KNEU';
	protected $primaryKey = 'sweatshirt_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_sweatshirts_KNEU', 'sweatshirt_id', 'size_id');
	}
}
