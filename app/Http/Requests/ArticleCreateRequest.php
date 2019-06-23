<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
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
            'title' => 'required|max:255' ,
        ];
    }

    /**
     *  Get the validation rules result notice messages on the request
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required' ,
        ];
    }
}
