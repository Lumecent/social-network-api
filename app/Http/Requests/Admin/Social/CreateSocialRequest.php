<?php

namespace App\Http\Requests\Admin\Social;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $regex
 *
 * Class CreateSocialRequest
 * @package App\Http\Requests\Admin\Social
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
            'name' => 'required|string|min:2|max:20|alpha|unique:socials,name',
            'regex' => 'required|string'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Вид связи',
            'regex' => 'Регулярное выражение'
        ];
    }
}
