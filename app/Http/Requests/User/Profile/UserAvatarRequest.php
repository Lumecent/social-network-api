<?php

namespace App\Http\Requests\User\Profile;

use App\Rules\StringImgMimes;
use App\Rules\StringImgSize;
use App\Services\Service;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $avatar
 *
 * Class UserAvatarRequest
 * @package App\Http\Requests\User\Profile
 */
class UserAvatarRequest extends FormRequest
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
            'avatar' => ['required', 'string', new StringImgSize(5242880), new StringImgMimes(['png', 'jpg', 'jpeg'])]
        ];
    }

    public function attributes()
    {
        return [
            'avatar' => 'Аватар'
        ];
    }
}
