<?php

namespace App\Http\Requests\Admin\Published;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 *
 * Class CreatePublishedRequest
 * @package App\Http\Requests\Admin\Published
 */
class CreatePublishedRequest extends FormRequest
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
            'name' => 'required|string|alpha|unique:publisheds,name'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Название способа публикации'
        ];
    }
}
