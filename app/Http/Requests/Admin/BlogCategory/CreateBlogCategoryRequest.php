<?php

namespace App\Http\Requests\Admin\BlogCategory;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 *
 * Class CreateBlogCategoryRequest
 * @package App\Http\Requests\Admin\BlogCategory
 */
class CreateBlogCategoryRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:20|unique:blogs_categories,name'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Название категории'
        ];
    }
}
