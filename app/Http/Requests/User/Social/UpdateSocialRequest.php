<?php

namespace App\Http\Requests\User\Social;

use App\Rules\User\RegexSocialUrl;
use App\Services\Service;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property integer $id
 * @property string $social
 * @property string $url
 *
 * Class CreateSocialRequest
 * @package App\Http\Requests\User\Social
 */
class UpdateSocialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Service::getInstance()->general->alias->belongsToUser($this->route('alias')) &&
            Service::getInstance()->general->resource->belongsTo('social', $this->route('social_id'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:users_socials,id',
            'social' => ['required', 'exists:socials,name'],
            'url' => ['required', new RegexSocialUrl($this->request->get('social'))],
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'Контакт',
            'social' => 'Вид связи'
        ];
    }
}
