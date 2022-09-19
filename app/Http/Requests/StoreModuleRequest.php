<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreModuleRequest extends FormRequest
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
            'name' => ['required',Rule::unique('modules')],
            'route' => ['required',Rule::unique('modules')],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter :attribute',
            'name.unique' => 'Please enter different :attribute',
            'route.required' => 'Please enter :attribute',
            'route.unique' => 'Please enter different :attribute',
        ];
    }
}
