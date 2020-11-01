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
 * Class UserCreateSocialRequest
 * @package App\Http\Requests\User\Social
 */
class UserCreateSocialRequest extends FormRequest
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
        $regexUrl = [
            'vk' => '(https{0,1}:\/\/)?(www\.)?(vk.com\/)(id\d|[a-zA-z][a-zA-Z0-9_.]{2,})',
            'fb' => '(https{0,1}:\/\/)?(www\.)?(facebook.com\/)([a-zA-z][a-zA-Z0-9_.]{2,})',
            'ok' => '(https{0,1}:\/\/)?(www\.)?(ok.ru\/)([a-zA-z][a-zA-Z0-9_.]{2,})',
            'twit' => '(https{0,1}:\/\/)?(www\.)?(twitter.com\/)([a-zA-z][a-zA-Z0-9_.]{2,})',
            'inst' => '(https{0,1}:\/\/)?(www\.)?(instagram.com\/)([a-zA-z][a-zA-Z0-9_.]{2,})',
            'site' => '(http:\/\/|https:\/\/)?([^\.\/]+\.)*([a-zA-Z0-9])([a-zA-Z0-9-]*)\.([a-zA-Z]{2,6})(\/.*)',
        ];

        return [
            'social' => ['required', 'exists:socials,name', new MaxCountSocial(10)],
            'url' => ['required', new RegexSocialUrl($regexUrl, $this->request->get('social'))],
        ];
    }
}
