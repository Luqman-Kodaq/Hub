<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name'  => 'required',
            'email' => [
              'required',
              'email',
              Rule::unique('users')->ignore($request->id)
            ],
            'password'          => [
                'required',
                'min:8|max:25',
                Rule::unique('users')->ignore($request->id)
            ],
            'confirm_password'  => 'required|same:password'
        ];
    }
}
