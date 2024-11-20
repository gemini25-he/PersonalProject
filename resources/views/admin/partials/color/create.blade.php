
@extends('admin.layouts.master')

@section('content')
@section('title','Thêm màu')
    

<form action="{{ route('colors.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Tên màu</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" >
        
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="hex_code">Mã màu</label>
        <input type="text" class="form-control @error('hex_code') is-invalid @enderror" id="hex_code" name="hex_code" value="{{ old('hex_code') }}" >
        
        @error('hex_code')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <button type="submit" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Thêm
    </button>
</form>

    

@endsection