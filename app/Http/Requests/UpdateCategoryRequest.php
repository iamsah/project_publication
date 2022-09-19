<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
        $categoryId = $this->route('category.id');
        return [
            'name' => ['required',Rule::unique('categories')->ignore($categoryId)],
            'slug' => ['required',Rule::unique('categories')->ignore($categoryId)],
            'rank' => ['required'],
            'short_description' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter :attribute',
            'name.unique' => 'Please enter different :attribute',
            'slug.required' => 'Please enter :attribute',
            'slug.unique' => 'Please enter different :attribute',
            'rank.required' => 'Please enter :attribute',
            'short_description.required' => 'Please enter :attribute',
        ];
    }
}
