<?php

namespace App\Http\Requests\Admin\Published;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property integer $id
 * @property string $name
 *
 * Class UpdatePublishedRequest
 * @package App\Http\Requests\Admin\Published
 */
class UpdatePublishedRequest extends FormRequest
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
            'id' => 'required|exists:publisheds,id',
            'name' => 'required|string|alpha|unique:publisheds,name'
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'Способ публикации',
            'name' => 'Название способа публикации'
        ];
    }
}
