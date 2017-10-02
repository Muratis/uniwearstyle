<?php

namespace App\Models\Bombers;

use Illuminate\Database\Eloquent\Model;

class Bomber_NMU extends Model
{
	protected $table = 'bombers_NMU';
	protected $primaryKey = 'bomber_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_bombers_NMU', 'bomber_id', 'size_id');
	}
}
