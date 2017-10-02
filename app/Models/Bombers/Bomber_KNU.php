<?php

namespace App\Models\Bombers;

use Illuminate\Database\Eloquent\Model;

class Bomber_KNU extends Model
{
	protected $table = 'bombers_KNU';
	protected $primaryKey = 'bomber_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_bombers_KNU', 'bomber_id', 'size_id');
	}
}
