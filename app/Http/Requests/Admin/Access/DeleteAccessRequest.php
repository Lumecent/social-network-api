<?php

namespace App\Http\Requests\Admin\Access;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property integer $id
 *
 * Class DeleteAccessRequest
 * @package App\Http\Requests\Admin\Access
 */
class DeleteAccessRequest extends FormRequest
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
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'Вид доступа',
        ];
    }
}
