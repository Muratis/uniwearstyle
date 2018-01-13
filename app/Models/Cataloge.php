<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cataloge extends Model
{
	protected $table = 'cataloge';
	protected $primaryKey = 'id';

	public function cataloge_sizes()
	{
		return $this->belongsToMany('App\Models\Sizes', 'sizes_cataloge', 'id', 'size_id');
	}
}
