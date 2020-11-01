<?php

namespace App\Http\Requests\User\Security;

use App\Rules\User\ValidateOldPassword;
use App\Services\Service;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $password_old
 * @property string $password
 * @property string $password_confirm
 *
 * Class UpdatePasswordRequest
 * @package App\Http\Requests\User\Security
 */
class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Service::getInstance()->general->alias->belongsToUser($this->route('alias'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_old' => ['required', 'min:6', 'max:64', new ValidateOldPassword()],
            'password' => 'required|min:6|max:64',
            'password_confirm' => 'required|same:password'
        ];
    }

    public function attributes()
    {
        return [
            'password_old' => 'Старый пароль'
        ];
    }
}
