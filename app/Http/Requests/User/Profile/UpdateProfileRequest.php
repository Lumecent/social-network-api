<?php

namespace App\Http\Requests\User\Profile;

use App\Repositories\Repository;
use App\Rules\LengthWithoutHtmlMax;
use App\Rules\User\AliasExistsOrUnique;
use App\Services\Service;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $alias
 * @property string $info
 * @property string $date_bd
 *
 * Class UpdateProfileRequest
 * @package App\Http\Requests\User\Profile
 */
class UpdateProfileRequest extends FormRequest
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
            'alias' => ['required', 'min:3', 'max:30', 'alpha_dash', new AliasExistsOrUnique()],
            'info' => ['nullable', new LengthWithoutHtmlMax(1000)],
            'date_bd' => 'nullable|date_format:Y-m-d|before_or_equal:' . date('Y-m-d')
        ];
    }

    public function attributes()
    {
        return [
            'alias' => 'Адрес страницы',
            'info' => 'Информация',
            'date_bd' => 'Дата рождения'
        ];
    }
}
