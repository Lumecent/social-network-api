<?php

namespace App\Http\Requests\Admin\Tag;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property integer $id
 * @property string $name
 *
 * Class UpdateTagRequest
 * @package App\Http\Requests\Admin\Tag
 */
class UpdateTagRequest extends FormRequest
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
            'id' => 'required|exists:tags,id',
            'name' => 'required|string|alpha|unique:tags,name'
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'Тег',
            'name' => 'Название тега'
        ];
    }
}
