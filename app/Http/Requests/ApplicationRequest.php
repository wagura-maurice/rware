<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'uniqueID'        => 'required|string',
            'user_id'         => 'required|integer',
            'business_id'     => 'required|integer',
            'category_id'     => 'required|string',
            'total_amount'    => 'required|numeric',
            'paid_amount'     => 'nullable|string',
            'expiration_date' => 'required|date',
            'description'     => 'nullable|string'
        ];

        if (request()->method == 'PUT') {
            $rules = array_merge($rules, [
                'uniqueID'        => 'nullable|string',
                'user_id'         => 'nullable|integer',
                'business_id'     => 'nullable|integer',
                'category_id'     => 'nullable|string',
                'total_amount'    => 'nullable|string',
                'paid_amount'     => 'nullable|string',
                'expiration_date' => 'nullable|date',
                'description'     => 'nullable|string'
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
            'uniqueID'        => 'enter a unique ID for the certificate',
            'user_id'         => 'enter user applying for certificate',
            'business_id'     => 'enter business applying for certificate',
            'category_id'     => 'enter certification category of application',
            'total_amount'    => 'enter total amount price for application processing',
            'paid_amount'     => 'enter paid amount for application processing',
            'expiration_date' => 'enter expiration date of application',
            'description'     => 'enter small description of application'
        ];
    }
}
