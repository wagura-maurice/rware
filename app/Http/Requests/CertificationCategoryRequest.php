<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CertificationCategoryRequest extends FormRequest
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
            'certification_type_id' => 'required|integer',
            'name'                  => 'required|string',
            'price'                 => 'required|string',
            'period'                => 'required|string',
            'description'           => 'nullable|string'
        ];

        if (request()->method == 'PUT') {
            $rules = array_merge($rules, [
                'certification_type_id' => 'nullable|integer',
                'name'                  => 'nullable|string',
                'price'                 => 'nullable|string',
                'period'                => 'nullable|string',
                'description'           => 'nullable|string'
            ]);
        }

        return $rules;
    }
}
