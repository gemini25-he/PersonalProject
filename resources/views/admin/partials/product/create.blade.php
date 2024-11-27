@extends('admin.layouts.master')

@section('content')
@section('title', 'Thêm Sản Phẩm')
@section('page', 'Thêm Sản Phẩm')

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Tên Sản Phẩm -->
    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Mô Tả -->
    <div class="form-group">
        <label for="description">Mô tả sản phẩm</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
            rows="4" required>{{ old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Giá -->
    <div class="form-group">
        <label for="price">Giá sản phẩm</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
            value="{{ old('price') }}" required>
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Thương Hiệu -->
    <div class="form-group">
        <label for="brand_id">Thương hiệu</label>
        <select class="form-control @error('brand_id') is-invalid @enderror" id="brand_id" name="brand_id" required>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                    {{ $brand->name }}</option>
            @endforeach
        </select>
        @error('brand_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Danh Mục -->
    <div class="form-group">
        <label for="category_id">Danh mục</label>
        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id"
            required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Ảnh Sản Phẩm -->
    <div class="form-group">
        <label for="image">Ảnh sản phẩm</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
            accept="image/*" required>
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Biến Thể -->
    <div class="form-group">
        <label for="variants">Biến thể</label>

        <!-- Khung Biến thể đầu tiên mặc định -->
        <div id="variant-container">
            <div class="variant-group p-3 m-2 border rounded mb-4">
                <div class="d-flex flex-wrap gap-3">
                    <div class="form-group flex-fill">
                        <label for="size_id">Kích cỡ</label>
                        <select class="form-control" name="variants[0][size_id]">
                            
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group flex-fill">
                        <label for="color_id">Màu sắc</label>
                        <select class="form-control" name="variants[0][color_id]">
                        
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group flex-fill">
                        <label for="sku">Mã sản phẩm (SKU)</label>
                        <input type="text" class="form-control" name="variants[0][sku]">
                    </div>
                    <div class="form-group flex-fill">
                        <label for="variant_price">Giá biến thể</label>
                        <input type="number" class="form-control" name="variants[0][price]">
                    </div>
                    <div class="form-group flex-fill">
                        <label for="quantity">Số lượng</label>
                        <input type="number" class="form-control" name="variants[0][quantity]">
                    </div>
                    <div class="form-group flex-fill">
                        <label for="is_featured">Nổi bật</label>
                        <input type="checkbox" name="variants[0][is_featured]">
                    </div>
                </div>
                <button type="button" class="btn btn-danger remove-variant">Xóa Biến Thể</button>
            </div>
        </div>

        <!-- Nút Thêm Biến Thể -->
        <button type="button" class="btn btn-info" id="add-variant" style="margin-top: 10px;">Thêm Biến Thể</button>
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Thêm Sản Phẩm
    </button>
</form>

<script>
   document.getElementById('add-variant').addEventListener('click', function() {
    // Lấy số lượng biến thể hiện tại để gán chỉ mục mới
    const variantsCount = document.querySelectorAll('.variant-group').length;
    
    const variantHtml = `
        <div class="variant-group p-3 m-2 border rounded mb-4">
            <div class="d-flex flex-wrap gap-3">
                <div class="form-group flex-fill">
                    <label for="size_id">Kích cỡ</label>
                    <select class="form-control" name="variants[${variantsCount}][size_id]">
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group flex-fill">
                    <label for="color_id">Màu sắc</label>
                    <select class="form-control" name="variants[${variantsCount}][color_id]">
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group flex-fill">
                    <label for="sku">Mã sản phẩm (SKU)</label>
                    <input type="text" class="form-control" name="variants[${variantsCount}][sku]" >
                </div>
                <div class="form-group flex-fill">
                    <label for="variant_price">Giá biến thể</label>
                    <input type="number" class="form-control" name="variants[${variantsCount}][price]" >
                </div>
                <div class="form-group flex-fill">
                    <label for="quantity">Số lượng</label>
                    <input type="number" class="form-control" name="variants[${variantsCount}][quantity]" required>
                </div>
                <div class="form-group flex-fill">
                    <label for="is_featured">Nổi bật</label>
                    <input type="checkbox" name="variants[${variantsCount}][is_featured]">
                </div>
            </div>
            <button type="button" class="btn btn-danger remove-variant">Xóa Biến Thể</button>
        </div>
    `;
    
    document.getElementById('variant-container').insertAdjacentHTML('beforeend', variantHtml);

    // Xử lý xóa biến thể
    document.querySelectorAll('.remove-variant').forEach(function(button) {
        button.addEventListener('click', function() {
            button.closest('.variant-group').remove();
        });
    });
});

</script>

@endsection
