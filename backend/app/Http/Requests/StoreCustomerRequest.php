<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => ['required'],
            'lastname' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'city' => ['required'],
            'district' => ['required'],
            'wards' => ['required'],
            'address' => ['required'],
            'type' => ['required'],
        ];
    }
}
