<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
        $id = $this->route('category');
        return [
            'name' => ['required', 'max:255', 'regex:/^[\pL\s]+$/u', Rule::unique('categories')->ignore($id)]
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute  không được để trống.',
            'unique' => ':attribute này đã tồn tại, vui lòng chọn tên danh mục khác.',
            'max' => ':attribute không được vượt quá 255 ký tự.',
            'regex' => ':attribute không được chứa số và ký tự đặc biệt'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Danh mục',
        ];
    }
}
