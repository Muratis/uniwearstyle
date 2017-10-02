<?php

namespace App\Models\Bombers;

use Illuminate\Database\Eloquent\Model;

class Bomber_KPI extends Model
{
	protected $table = 'bombers_KPI';
	protected $primaryKey = 'bomber_id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'size_bombers_KPI', 'bomber_id', 'size_id');
	}
}
