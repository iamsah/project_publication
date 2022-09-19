<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePermissionRequest extends FormRequest
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
        $permissionId = $this->route('permission.id');
        return [
            'module_id' => ['required'],
            'name' => ['required',Rule::unique('permissions')->ignore($permissionId)],
            'route' => ['required',Rule::unique('permissions')->ignore($permissionId)],
        ];
    }
    public function messages()
    {
        return [
            'module_id.required' => 'Please select :attribute',
            'name.required' => 'Please enter :attribute',
            'name.unique' => 'Please enter different :attribute',
            'route.required' => 'Please enter :attribute',
            'route.unique' => 'Please enter different :attribute',
        ];
    }
}
