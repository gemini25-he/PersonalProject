@extends('admin.layouts.master')

@section('content')
@section('title', 'Chi tiết Sản Phẩm')
@section('page', 'Chi tiết Sản Phẩm')

<div class="container">
    <!-- Tiêu đề sản phẩm -->
    <div class="row mb-4">
        <div class="col-md-3">
            <strong>Tên Sản Phẩm:</strong>
        </div>
        <div class="col-md-9">
            <p>{{ $product->name }}</p>
        </div>
    </div>

    <!-- Mô tả sản phẩm -->
    <div class="row mb-4">
        <div class="col-md-3">
            <strong>Mô Tả:</strong>
        </div>
        <div class="col-md-9">
            <p>{{ $product->description }}</p>
        </div>
    </div>

    <!-- Thông tin sản phẩm -->
    <div class="row mb-4">
        <div class="col-md-3">
            <strong>Giá Sản Phẩm:</strong>
        </div>
        <div class="col-md-9">
            <p>{{ number_format($product->price, 0, ',', '.') }} VND</p>
        </div>

        <div class="col-md-3">
            <strong>Thương Hiệu:</strong>
        </div>
        <div class="col-md-9">
            <p>{{ $product->brand->name }}</p>
        </div>

        <div class="col-md-3">
            <strong>Danh Mục:</strong>
        </div>
        <div class="col-md-9">
            <p>{{ $product->category->name }}</p>
        </div>
    </div>


    <!-- Biến thể sản phẩm -->
    <div class="row mb-4">
        <div class="col">
            <h5>Biến Thể Sản Phẩm</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kích Cỡ</th>
                        <th>Màu Sắc</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>SKU</th>
                        <th>Chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product->variants as $variant)
                        <tr>
                            <td>{{ $variant->size->name }}</td>
                            <td>{{ $variant->color->name }}</td>
                            <td>{{ number_format($variant->price, 0, ',', '.') }} VND</td>
                            <td>{{ $variant->quantity }}</td>
                            <td>{{ $variant->sku }}</td>
                            <td>
                                <button class="btn btn-success btn-sm">Chọn</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
<a href="{{ route('products.index')}}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Trở lại
</a>
@endsection
