<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'type' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'No name',
            'email.required' => 'No email',
            'password.required' => 'No password',
            'type.required' => 'No Type'
        ];
    }
}
