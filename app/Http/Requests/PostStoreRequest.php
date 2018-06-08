<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'slug'                     => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'title'                     => 'required|max:255|unique:posts',
            'excerpt'               => 'nullable',
            'contents'             => 'required',
            'image'                 => 'nullable',
            'category_id'        => 'integer',
            'tags'                    => 'required'
        ];
    }
}
