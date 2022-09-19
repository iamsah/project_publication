<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
        $roleId = $this->route('role.id');
        return [
            'name' => ['required',Rule::unique('roles')->ignore($roleId)],
            'key' => ['required',Rule::unique('roles')->ignore($roleId)],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'You must enter :attribute',
            'key.required' => 'Please enter :attribute',
        ];
    }
}
