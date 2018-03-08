<?php

namespace App\Repositories;
use App\Models\Dispatch;

class DispatchRepository
{
	public function __construct()
	{
		$this->email = new Dispatch();
	}

	public function AddEmailForDispatch($data)
	{
//		$this->email->email = $data->email_dispatch;
//		$this->email->save();

		$uniwears = $data->universities;

		foreach ($uniwears as $uniwear) {
			$university_dispatch = new Dispatch();
			$university_dispatch->email= $data->email_dispatch;
			$university_dispatch->university= $uniwear;
			$university_dispatch->save();
		}
	}
}