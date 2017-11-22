<?php
namespace App\Models\Cataloge;

use Illuminate\Database\Eloquent\Model;

class Bombers extends Model
{
	protected $table = 'bombers';
	protected $primaryKey = 'id';

	public function cataloge()
	{
		return $this->belongsToMany('App\Models\Sizes', 'sizes_bomber', 'id', 'size_id');
	}
}
