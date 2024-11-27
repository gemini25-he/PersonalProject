@extends('admin.layouts.master')

@section('content')
@section('page', 'Quản lý sản phẩm')

@section('title', 'Danh sách sản phẩm')

<a class="btn btn-primary mb-4" href="{{ route('products.create') }}">Thêm mới sản phẩm</a>
<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                    <td>{{ $product->status == 1 ? 'Hoạt động' : 'Ngừng hoạt động' }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Image" width="100">
                        @else
                            <span>Không có hình ảnh</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-link btn-sm"> <i
                                class="fas fa-eye"></i></a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-link btn-sm"> <i
                                class="fas fa-edit"></i> </a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link btn-sm text-danger"> <i
                                    class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Hiển thị phân trang -->
    {{ $products->links() }}

</div>



@if (session('toast_success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-primary">
                <strong class="me-auto">Success</strong>
                <small>Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-primary">
                {{ session('toast_success') }}
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastElement = document.getElementById('liveToast');
            if (toastElement) {
                var toast = new bootstrap.Toast(toastElement, {
                    delay: 2000
                });
                toast.show();
            }
        });
    </script>
@endif

@endsection
