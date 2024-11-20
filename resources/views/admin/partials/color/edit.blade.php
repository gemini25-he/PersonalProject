
@extends('admin.layouts.master')

@section('content')
@section('title','Edit Color: '.$color->name)
    

<form action="{{ route('colors.update', $color->id) }}" method="POST">
    @csrf
@method('PUT')
    <div class="form-group">
        <label for="name">Tên màu</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $color->name }}" >
        
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="hex_code">Mã màu</label>
        <input type="text" class="form-control @error('hex_code') is-invalid @enderror" id="hex_code" name="hex_code" value="{{ $color->hex_code }}" >
        
        @error('hex_code')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-check"></i> Save
    </button>

    <a href="{{ route('categorys.index')}}" class="btn btn-primary">
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