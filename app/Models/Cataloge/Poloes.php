<?php
namespace App\Models\Cataloge;

use Illuminate\Database\Eloquent\Model;

class Poloes extends Model
{
	protected $table = 'poloes';
	protected $primaryKey = 'id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'sizes_polo', 'id', 'size_id');
	}
}
