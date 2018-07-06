<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            // 'slug'                     => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'title' => [
                 'required',
                 'max:255',
                 Rule::unique('posts')->ignore($request->id)
                ],
            'excerpt' => 'nullable',
            'contents' => 'required',
            'image' => 'nullable',
            'category_id' => 'integer',
            'tags' => 'required'
        ];
    }
}
