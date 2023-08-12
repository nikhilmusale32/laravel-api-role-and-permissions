<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'email' => 'required|email|exists:users.email',
            'password' => 'required|max:25|min:6'
            //
        ];
    }
    public function failedValidator(Validator $validator)
    {
        //send error

        Helper::sendError('validation error',$validator->errors());
    }
}
