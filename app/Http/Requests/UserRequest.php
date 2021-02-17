<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {

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
        $rules = [
            'role_id'  => 'nullable|numeric',
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'nullable|between:8,12',
            'photo'    => 'nullable|image|mimes:jepg,jpg,png,svg|max:1024',
        ];

        request()->method() === 'PUT' && $rules['email'] = "{$rules['email']},email,{$this->user->id}";

        return $rules;
    }
}
