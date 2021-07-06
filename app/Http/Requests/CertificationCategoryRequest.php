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

    /**
     * Customized attribute Response
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'certification_type_id' => 'enter certification type assigned to certificate',
            'name'                  => 'enter name of certification category',
            'price'                 => 'enter price amount of certificate per square foot',
            'period'                => 'enter validity duration in months of certificate',
            'description'           => 'enter small description of certification category'
        ];
    }
}
