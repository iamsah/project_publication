<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoleRequest extends FormRequest
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
            'name' => ['required',Rule::unique('roles')],
            'key' => ['required',Rule::unique('roles')],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter :attribute',
            'name.unique' => 'please enter different :attribute',
            'key.required' => 'Please enter :attribute',
            'key.unique' => 'Please enter different :attribute',
        ];
    }
}
