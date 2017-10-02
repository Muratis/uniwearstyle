<?php

namespace App\Models\Bombers;

use Illuminate\Database\Eloquent\Model;

class Bomber_KNEU extends Model
{
	protected $table = 'bombers_KNEU';
	protected $primaryKey = 'bomber_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_bombers_KNEU', 'bomber_id', 'size_id');
	}
}
