<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|unique:categories,name|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục là bắt buộc.',
            'name.unique' => 'Tên danh mục này đã tồn tại. Vui lòng chọn tên khác.',
            'name.max' => 'Tên danh mục không được dài quá 255 ký tự.',
        ];
    }
}
