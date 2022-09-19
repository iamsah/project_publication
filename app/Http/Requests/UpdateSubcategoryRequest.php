<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubcategoryRequest extends FormRequest
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
        $subcategoryId = $this->route('subcategory.id');
        return [
            'category_id' => ['required'],
            'name' => ['required',Rule::unique('subcategories')->ignore($subcategoryId)],
            'slug' => ['required',Rule::unique('subcategories')->ignore($subcategoryId)],
            'rank' => ['required'],
            'short_description' => ['required'],

        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Please select :attribute',
            'name.required' => 'Please enter :attribute',
            'name.unique' => 'Please enter different :attribute',
            'slug.required' => 'Please enter :attribute',
            'slug.unique' => 'Please enter different :attribute',
            'rank.required' => 'Please enter :attribute',
            'short_description.required' => 'Please enter :attribute',
        ];
    }
}
