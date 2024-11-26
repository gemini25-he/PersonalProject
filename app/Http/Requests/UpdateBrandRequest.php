<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends FormRequest
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
        $id = $this->route('brand');
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]+$/',
                Rule::unique('brands')->ignore($id) // Loại trừ thương hiệu hiện tại khi kiểm tra unique
            ],
            'description' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống.',
            'unique' => ':attribute này đã tồn tại, vui lòng chọn tên khác.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'regex' => 'Đảm bảo :attribute không chứa ký tự đặc biệt.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên thương hiệu',
            'description' => 'Mô tả',
        ];
    }
}
