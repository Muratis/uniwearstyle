<?php
namespace App\Models\Cataloge;

use Illuminate\Database\Eloquent\Model;

class Sweatshirts extends Model
{
	protected $table = 'sweatshirts';
	protected $primaryKey = 'id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'sizes_sweatshirt', 'id', 'size_id');
	}
}
