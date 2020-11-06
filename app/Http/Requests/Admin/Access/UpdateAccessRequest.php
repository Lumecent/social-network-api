<?php

namespace App\Http\Requests\Admin\Access;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property integer $id
 * @property string $name
 *
 * Class UpdateAccessRequest
 * @package App\Http\Requests\Admin\Access
 */
class UpdateAccessRequest extends FormRequest
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
            'id' => 'required|exists:accesses,id',
            'name' => 'required|string|alpha|unique:accesses,name'
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'Вид доступа',
            'name' => 'Название доступа'
        ];
    }
}
