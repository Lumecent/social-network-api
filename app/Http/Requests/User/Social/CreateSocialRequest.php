<?php

namespace App\Http\Requests\User\Social;

use App\Rules\User\MaxCountSocial;
use App\Rules\User\RegexSocialUrl;
use App\Services\Service;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $social
 * @property string $url
 *
 * Class CreateSocialRequest
 * @package App\Http\Requests\User\Social
 */
class CreateSocialRequest extends FormRequest
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
            'social' => ['required', 'exists:socials,name', new MaxCountSocial(10)],
            'url' => ['required', new RegexSocialUrl($this->request->get('social'))],
        ];
    }
}
