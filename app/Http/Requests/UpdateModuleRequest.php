<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateModuleRequest extends FormRequest
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
        $moduleId = $this->route('module.id');
        return [
            'name' => ['required',Rule::unique('modules')->ignore($moduleId)],
            'route' => ['required',Rule::unique('modules')->ignore($moduleId)],
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
