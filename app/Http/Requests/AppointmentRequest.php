<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest {

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
            'client_id'   => 'required',
            'employee_id' => 'required',
            'start_time'  => 'required|date_format:'. config('dateFormat.date_format').' '.config('dateFormat.time_format'),
            'end_time'    => 'required|date_format:'. config('dateFormat.date_format').' '.config('dateFormat.time_format'),
            'price'       => 'numeric|min:0',
            'comments'    => 'nullable',
            'service_ids' => 'nullable',
		];
	}
}
