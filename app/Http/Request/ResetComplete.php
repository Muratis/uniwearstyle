<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ResetComplete extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'password' => 'required|between:8,100',
			'password_confirm' => 'required|same:password',
		];
	}
}
