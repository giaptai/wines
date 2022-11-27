<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class StoreOrderDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        $user = $this->user();
        return $user != NULL && $user->tokenCan('user:create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            '*.productId' => ['required'],
            '*.productName' => ['required'],
            '*.price' => ['required'],
            '*.quantity' => ['required'],
            '*.orderId' => ['required'],
        ];
    }
    protected function prepareForValidation()
    {
        $data = [];
        foreach ($this->toArray() as $obj) {
            $obj['product_id'] = $obj['productId'] ?? null;
            $obj['product_name'] = $obj['productName']  ?? null;
            $obj['order_id'] = $obj['orderId'] ?? null;
            $data[] = $obj;
        }
        $this->merge($data);
    }
}
