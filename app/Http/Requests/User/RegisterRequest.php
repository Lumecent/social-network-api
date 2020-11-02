<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $password_confirm
 *
 * Class RegisterRequest
 * @package App\Http\Requests\User
 */
class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:30|regex:/^[a-zа-яё\d\s-]+$/iu',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|max:64',
            'password_confirm' => 'required|string|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'Имя может содержать буквы, цифры, а так же тире'
        ];
    }
}
