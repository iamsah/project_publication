<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAuthorRequest extends FormRequest
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
        $authorID = $this->route('author.id');
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required',Rule::unique('authors')->ignore($authorID)],
            'contact' => ['required'],
            'address' => ['required'],
            'gender_id' => ['required'],
            'dob' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'Please enter :attribute',
            'last_name.required' => 'Please enter :attribute',
            'author.required' => 'Please enter :attribute',
            'author.unique' => 'Please enter different :attribute',
            'contact.required' => 'Please enter :attribute',
            'address.required' => 'Please enter :attribute',
            'gender_id.required' => 'Please select :attribute',
            'dob.required' => 'Please enter :attribute',
        ];
    }
}
