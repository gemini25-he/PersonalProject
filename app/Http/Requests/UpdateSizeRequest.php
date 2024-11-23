<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSizeRequest extends FormRequest
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
        $id = $this->route('size');

        return [
            'name' => [
                'required',
                'max:255',
                // Cho phép chữ cái, số, và khoảng trắng
                'regex:/^[\pL\s0-9]+$/u',
                Rule::unique('sizes')->ignore($id)
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute  không được để trống.',
            'unique' => ':attribute này đã tồn tại, vui lòng chọn tên danh mục khác.',
            'max' => ':attribute không được vượt quá 255 ký tự.',
            'regex' => 'Đảm bảo :attribute bắt đầu bằng #'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên màu',
        ];
    }
}
