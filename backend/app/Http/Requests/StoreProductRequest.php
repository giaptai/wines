<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        $user = request()->user();
        return $user != NULL && $user->role_as == 1 && $user->tokenCan('admin:create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'images' => ['required', 'string'],
            'quantity' => ['required', 'numeric'],
            'vol' => ['required', 'numeric'],
            'c' => ['required'],
            'brand_id' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric'],
            'origin_id' => ['required', 'numeric'],
            'price' => ['required'],
            'year' => ['required']
        ];
    }
}
