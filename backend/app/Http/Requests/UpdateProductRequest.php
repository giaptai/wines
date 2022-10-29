<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //     $user = request()->user();
        //     return $user != NULL && $user->role_as == 1 && $user->tokenCan('admin:update');
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
                'name' => ['required'],
                'description' => ['required'],
                'images' => ['required', 'mimes:jpg,png,web,jpeg,tiff,tag'],
                'quantity' => ['required', 'numeric'],
                'vol' => ['required', 'numeric'],
                'c' => ['required'],
                'brand_id' => ['required', 'numeric'],
                'category_id' => ['required', 'numeric'],
                'origin_id' => ['required', 'numeric'],
                'price' => ['required'],
                'year' => ['required'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required'],
                'description' => ['sometimes', 'required'],
                'images' => ['sometimes', 'required', 'mimes:jpg,png,web,jpeg,tiff,tag'],
                'quantity' => ['sometimes', 'required', 'numeric'],
                'vol' => ['sometimes', 'required', 'numeric'],
                'c' => ['sometimes', 'required'],
                'brand_id' => ['sometimes', 'required', 'numeric'],
                'category_id' => ['sometimes', 'required', 'numeric'],
                'origin_id' => ['sometimes', 'required', 'numeric'],
                'price' => ['sometimes', 'required'],
                'year' => ['sometimes', 'required'],
            ];
        }
    }
}
