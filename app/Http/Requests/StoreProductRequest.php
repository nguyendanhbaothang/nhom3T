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
            'name' => 'required',
            'quantity' => 'required|max:11',
            'price' => 'required|max:11',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'status' => 'required',
            'product_hot' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống!',
            'quantity.required' => 'Không được để trống!',
            'quantity.max' => 'Không được quá :max',
            'price.required' => 'Không được để trống!',
            'price.max' => 'Không được quá :max',
            'description.required' => 'Không được để trống!',
            'category_id.required' => 'Không được để trống!',
            'image.required' => 'Không được để trống!',
            'status.required' => 'Không được để trống!',
            'product_hot.required' => 'Không được để trống!',
        ];
    }
}
