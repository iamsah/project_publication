<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGenderRequest extends FormRequest
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
        $genderId = $this->route('gender.id');
        return [
            'name' => ['required',Rule::unique('genders')->ignore($genderId)],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter :attribute',
            'name.unique' => 'Please enter different :attribute',
        ];
    }
}
