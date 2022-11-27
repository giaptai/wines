<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();
        return $user != null && $user->tokenCan("user:create");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customerId' => ['required'],
            'total' => ['required', 'numeric'],
            'address' => ['required'],
            'phone' => ['required'],
            'fullname' => ['required'],
            'email' => ['required', 'email'],
        ];
        // return [
        //     'customerId' => ['required', 'integer'],
        //     'amount' => ['required', 'numeric'],
        //     'status' => ['required', Rule::in(['B', 'P', 'V', 'b', 'p', 'v'])],
        //     'billedDate' => ['required', 'date_format:Y-m-d H:i:s'],
        //     'paidDate' => ['date_format:Y-m-d H:i:s', 'nullable'],
        // ];
    }
    protected function prepareForValidation()
    {
        // $this->merge(['customerId' => 'customer_id']);

        // $data = [];
        // foreach ($this->toArray() as $obj) {
        //     $obj['customer_id'] = $obj['customerId'] ?? null;
        //     $obj['billed_date'] = $obj['billedDate'] ?? null;
        //     $obj['paid_date'] = $obj['paidDate'] ?? null;
        //     $data[] = $obj;
        // }
        $this->merge([
            'customerId' => 'customer_id'
        ]);
    }
}
