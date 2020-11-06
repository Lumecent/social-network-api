<?php

namespace App\Http\Requests\Admin\Access;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 *
 * Class CreateAccessRequest
 * @package App\Http\Requests\Admin\Access
 */
class CreateAccessRequest extends FormRequest
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
            'name' => 'required|string|alpha|unique:accesses,name'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Название доступа'
        ];
    }
}
