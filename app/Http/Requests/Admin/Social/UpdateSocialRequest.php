<?php

namespace App\Http\Requests\Admin\Social;

use App\Rules\Admin\SocialExistOrUnique;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $name
 * @property $regex
 *
 * Class UpdateSocialRequest
 * @package App\Http\Requests\Admin\Social
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
            'id' => 'required|exists:socials,id',
            'name' => ['required', 'string', 'min:2', 'max:20', 'alpha', new SocialExistOrUnique($this->request->get('id'))],
            'regex' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'Вид связи',
            'name' => 'Вид связи',
            'regex' => 'Регулярное выражение'
        ];
    }
}
