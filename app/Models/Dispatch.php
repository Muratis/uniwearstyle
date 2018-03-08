<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
	protected $table = 'dispatch';
	protected $primaryKey = 'email_id';


//	public function DispatchToEmail()
//	{
//		//Отношение один ко многим
//		return $this->hasMany('App\Models\UniversityDispatch', 'email_id', 'email_id');
//	}
}