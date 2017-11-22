<?php
namespace App\Models\Cataloge;

use Illuminate\Database\Eloquent\Model;

class Tshirts extends Model
{
	protected $table = 'tshirts';
	protected $primaryKey = 'id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'sizes_tshirt', 'id', 'size_id');
	}
}
