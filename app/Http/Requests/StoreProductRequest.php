<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'variants' => 'required|array|min:1',
            'variants.*.size_id' => 'required|exists:sizes,id',
            'variants.*.color_id' => 'required|exists:colors,id',
            'variants.*.sku' => 'required|string|max:255',
            'variants.*.price' => 'required|numeric',
            'variants.*.quantity' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'description.required' => 'Mô tả sản phẩm là bắt buộc.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'image.required' => 'Ảnh sản phẩm là bắt buộc.',
            'image.image' => 'File phải là ảnh.',
            'image.mimes' => 'Ảnh chỉ được phép có định dạng: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
            'brand_id.required' => 'Thương hiệu là bắt buộc.',
            'brand_id.exists' => 'Thương hiệu không hợp lệ.',
            'category_id.required' => 'Danh mục sản phẩm là bắt buộc.',
            'category_id.exists' => 'Danh mục không hợp lệ.',

            'variants.required' => 'Sản phẩm phải có ít nhất một biến thể.',
            'variants.array' => 'Biến thể phải là một mảng.',
            'variants.*.size_id.required' => 'Kích thước của biến thể là bắt buộc.',
            'variants.*.size_id.exists' => 'Kích thước không hợp lệ.',
            'variants.*.color_id.required' => 'Màu sắc của biến thể là bắt buộc.',
            'variants.*.color_id.exists' => 'Màu sắc không hợp lệ.',
            'variants.*.sku.required' => 'SKU của biến thể là bắt buộc.',
            'variants.*.price.required' => 'Giá của biến thể là bắt buộc.',
            'variants.*.price.numeric' => 'Giá của biến thể phải là số.',
            'variants.*.quantity.required' => 'Số lượng của biến thể là bắt buộc.',
            'variants.*.quantity.numeric' => 'Số lượng của biến thể phải là số.',
        ];
    }


    public function attributes()
    {
        return [
            'name' => 'tên sản phẩm',
            'description' => 'mô tả sản phẩm',
            'price' => 'giá sản phẩm',
            'image' => 'ảnh sản phẩm',
            'brand_id' => 'thương hiệu',
            'category_id' => 'danh mục sản phẩm',
            'variants' => 'biến thể',
            'variants.*.size_id' => 'kích thước của biến thể',
            'variants.*.color_id' => 'màu sắc của biến thể',
            'variants.*.sku' => 'SKU của biến thể',
            'variants.*.price' => 'giá của biến thể',
            'variants.*.quantity' => 'số lượng của biến thể',
        ];
    }
}
