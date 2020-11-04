<?php

namespace App\Http\Requests\Admin\Social;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property integer $id
 *
 * Class DeleteSocialRequest
 * @package App\Http\Requests\Admin\Social
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
            'id' => 'required|exists:socials,id'
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'Вид связи'
        ];
    }
}
