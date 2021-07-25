<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'  => 'required|string',
            'email' => 'required|email|unique:users',
            'role'  => 'required|string'
        ];

        if (request()->method == 'PUT') {
            $rules = array_merge($rules, [
                'name'  => 'nullable|string',
                'email' => 'nullable|email',
                'role'  => 'nullable|string'
            ]);
        }

        return $rules;
    }
}
