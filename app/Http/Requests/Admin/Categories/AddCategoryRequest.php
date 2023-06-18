<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Admin\BaseRequest;

class AddCategoryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:categories|max:255',
            'description' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter title',
            'title.unique' => 'Title already exists. Please enter another title',
            'title.max' => 'Please enter title no more than 255 characters',
            'description.required' => 'Please enter description',
            'description.max' => 'Please enter description no more than 255 characters'
        ];
    }
}
