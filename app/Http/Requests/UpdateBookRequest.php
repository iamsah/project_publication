<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
        $bookId = $this->route('book.id');
        return [
            'isbn' => ['required',Rule::unique('books')->ignore($bookId)],
            'title' => ['required',Rule::unique('books')->ignore($bookId)],
        ];
    }
    public function messages()
    {
        return [
            'isbn.required' => 'Please enter :attribute',
            'isbn.unique' => 'Please enter different :attribute',
            'title.required' => 'Please enter :attribute',
            'title.unique' => 'Please enter different :attribute',
        ];
    }
}
