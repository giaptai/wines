<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'firstname' => ['required'],
                'lastname' => ['required'],
                'phone' => ['required'],
                'email' => ['required', 'email'],
                'city' => ['required'],
                'state' => ['required'],
                'address' => ['required'],
                'type' => ['required'],
            ];
        } else {
            return [
                'firstname' => ['sometimes', 'required'],
                'lastname' => ['sometimes', 'required'],
                'phone' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email'],
                'city' => ['sometimes', 'required'],
                'state' => ['sometimes', 'required'],
                'address' => ['sometimes', 'required'],
                'type' => ['sometimes', 'required'],
            ];
        }
    }
}
