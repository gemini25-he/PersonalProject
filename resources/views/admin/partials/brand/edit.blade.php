
@extends('admin.layouts.master')

@section('content')
@section('title','Sửa brand: '.$brand->name)
@section('page','Sửa brand: '.$brand->name)
    

<form action="{{ route('brands.update', $brand->id) }}" method="POST">
    @csrf
@method('PUT')
    <div class="form-group">
        <label for="name">Tên brand</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $brand->name }}" >
        
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ $brand->description }}" >
        
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="logo">Logo thương hiệu</label>
        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
        
        @error('logo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Logo hiện tại:</label><br>
        @if ($brand->logo)
            <img src="{{ asset('storage/' . $brand->logo) }}" alt="Current Logo" width="100">
        @else
            <p>Chưa có logo</p>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-check"></i> Save
    </button>

    <a href="{{ route('brands.index')}}" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    
</form>

@if (session('msg'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast  " role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-primary">
            <strong class="me-auto">Success</strong>
            <small>Just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-primary">
            {{ session('msg') }}
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