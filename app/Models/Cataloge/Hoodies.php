<?php
namespace App\Models\Cataloge;

use Illuminate\Database\Eloquent\Model;

class Hoodies extends Model
{
	protected $table = 'hoodies';
	protected $primaryKey = 'id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'sizes_hoodie', 'id', 'size_id');
	}
}
