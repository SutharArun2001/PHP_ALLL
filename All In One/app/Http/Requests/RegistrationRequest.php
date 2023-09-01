<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:student',
            'phonenumber' => 'required|numeric|digits:10',
            'gender' => 'required',
            'password' => 'required|max:8',   
            // 'userphoto' => 'required|mimes:jpeg,png,jpg',   
        ];
    }
}
