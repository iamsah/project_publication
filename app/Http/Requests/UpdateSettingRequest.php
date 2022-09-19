<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'name' => ['required'],
            'address' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'pan_no' => ['required'],

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter :attribute',
            'address.required' => 'Please enter :attribute',
            'email.required' => 'Please enter :attribute',
            'phone.required' => 'Please enter :attribute',
            'pan_no.required' => 'Please enter :attribute',
        ];
    }
}
