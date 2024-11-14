@extends('admin.layouts.master')

@section('content')
@section('title', 'List Categorys')





<a class="btn btn-primary" href="{{ route('categorys.create') }}">Add new Category</a>
<div class="card-body">
    <table class="table table-bordered" id="categoryTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID.</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if ($category->is_active == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('categorys.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categorys.destroy', $category->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $data->links() }}
@if (session('toast_success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast  bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
               
                <strong class="me-auto">Success</strong>
                <small>Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('toast_success') }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastElement = document.getElementById('liveToast');
            if (toastElement) {
                var toast = new bootstrap.Toast(toastElement, {
                    delay: 4200 // Set the delay to 1200ms (1.2 seconds)
                });
                toast.show();
    
                // Automatically hide toast after 1.2 seconds if not clicked
                setTimeout(function() {
                    toast.hide();
                }, 4200);
            }
        });
    </script>
    
@endif
@endsection
