<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            //

                'name' => 'required|unique:categories|min:2',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được để trống!',
            'name.unique' => 'Thể loại đã tồn tại!',
            'name.min' => 'Lớn hơn :min',
        ];
}
}
