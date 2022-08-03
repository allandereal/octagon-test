<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'phone' => [
                'string', 
                'regex:/^\+[0-9]*$/', 
                'required', 
                'starts_with:+', 
                'min:11', 
                'max:13',
                'exists:App\Models\User,phone'
            ],
            'password' => ['required', 'string', 'min:5']
        ];
    }
}
