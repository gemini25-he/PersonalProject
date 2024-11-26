@extends('admin.layouts.master')

@section('content')
@section('title', 'Danh sách brand đã xóa')
@section('page', 'Danh sách brand đã xóa')


<div class="card-body">
    <table class="table table-bordered" id="categoryTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID.</th>
                <th>Tên brand</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>
                        @if ($brand->is_active == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>                                  
                        <form action="{{ route('brands.restore', $brand) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-link btn-sm text-info"
                                onclick="return confirm('Bạn muốn khôi phục thương hiệu này chứ?')">
                                <i class="fas fa-undo"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<a href="{{ route('brands.index')}}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Trở lại
</a>
{{ $data->links() }}
@if (session('toast_success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast  " role="alert" aria-live="assertive" aria-atomic="true">
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
                    delay: 2000 // Set the delay to 1200ms (1.2 seconds)
                });
                toast.show();
                // Automatically hide toast after 1.2 seconds if not clicked
                setTimeout(function() {
                    toast.hide();
                }, 2000);
            }
        });
    </script>
@endif
@endsection
