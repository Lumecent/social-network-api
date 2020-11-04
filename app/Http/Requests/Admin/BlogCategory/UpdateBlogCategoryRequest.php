<?php

namespace App\Http\Requests\Admin\BlogCategory;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property integer $id
 * @property string $name
 *
 * Class UpdateBlogCategoryRequest
 * @package App\Http\Requests\Admin\BlogCategory
 */
class UpdateBlogCategoryRequest extends FormRequest
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
            'id' => 'required|exists:blogs_categories,id',
            'name' => 'required|string|min:3|max:20|unique:blogs_categories,name'
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'Категория',
            'name' => 'Название категории'
        ];
    }
}
