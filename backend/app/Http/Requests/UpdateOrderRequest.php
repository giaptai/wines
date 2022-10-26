<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //     $user = $this->user();
        //     return ($user != null && $user->tokenCan("user:update")) || ($user != null && $user->tokenCan("admin:update"));
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
                'customer_id' => ['required'],
                'fullname' => ['required'],
                'address' => ['required'],
                'phone' => ['required'],
                'email' => ['required', 'email'],
                'total' => ['required'],
                'status' => ['required'],
            ];
        } else {
            return [
                'customer_id' => ['sometimes', 'required'],
                'fullname' => ['sometimes', 'required'],
                'address' => ['sometimes', 'required'],
                'phone' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email'],
                'total' => ['sometimes', 'required'],
                'status' => ['sometimes', 'required'],
            ];
        }
    }
}
