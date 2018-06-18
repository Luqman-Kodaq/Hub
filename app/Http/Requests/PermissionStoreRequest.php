<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PermissionStoreRequest extends FormRequest
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

            if ($request->has('name')) {
                return [
                'name'  =>  'required|max:255|alphadash|unique:permissions,name',
                'display_name'              => 'required|max:255',
                'description'              => 'sometimes|max:255',
                ];
            } elseif ($request->has('resource')) {
                return [
                    'resource' => 'required|min:3|max:100|alpha',
                ];
            }
    }
}
