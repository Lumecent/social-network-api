<?php

namespace App\Http\Requests\User\Social;

use App\Services\Service;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property integer $id
 *
 * Class DeleteSocialRequest
 * @package App\Http\Requests\User\Social
 */
class DeleteSocialRequest extends FormRequest
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
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'Контакт',
        ];
    }
}
