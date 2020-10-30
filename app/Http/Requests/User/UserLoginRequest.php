<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $email
 * @property string $password
 *
 * Class UserLoginRequest
 * @package App\Http\Requests\User
 */
class UserLoginRequest extends FormRequest
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
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:6|max:64',
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'Введенные учетные данные неверны',
        ];
    }
}
