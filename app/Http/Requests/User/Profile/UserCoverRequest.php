<?php

namespace App\Http\Requests\User\Profile;

use App\Rules\StringImgMimes;
use App\Rules\StringImgSize;
use App\Services\Service;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $cover
 *
 * Class UserCoverRequest
 * @package App\Http\Requests\User\Profile
 */
class UserCoverRequest extends FormRequest
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
            'cover' => ['required', new StringImgSize(5242880), new StringImgMimes(['png', 'jpg', 'jpeg'])]
        ];
    }
}
