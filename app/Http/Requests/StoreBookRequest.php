<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookRequest extends FormRequest
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
            'isbn' => ['required',Rule::unique('books')],
            'pdf_file' => ['required'],
            'title' => ['required',Rule::unique('books')],
        ];
    }
    public function messages()
    {
        return [
            'isbn.required' => 'Please enter :attribute',
            'pdf_file.required' => 'Please enter :attribute',
            'isbn.unique' => 'Please enter different :attribute',
            'title.required' => 'Please enter :attribute',
            'title.unique' => 'Please enter different :attribute',
        ];
    }
}
