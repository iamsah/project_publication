<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubcategoryRequest extends FormRequest
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
            'category_id' => ['required'],
            'name' => ['required',Rule::unique('subcategories')],
            'slug' => ['required',Rule::unique('subcategories')],
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
