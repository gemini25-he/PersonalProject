<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:sizes,name|regex:/^[a-zA-Z0-9\s]+$/',
            'description' => 'nullable|string|max:500',
            'logo' => 'nullable|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute này đã tồn tại, vui lòng chọn tên khác.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'regex' => 'Đảm bảo :attribute không chứa ký tự đặc biệt.',
            'logo.max' => 'Dung lượng :attribute không được vượt quá 2MB.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên thương hiệu',
            'logo' => 'Logo',
        ];
    }
}
