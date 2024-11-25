
@extends('admin.layouts.master')

@section('content')
@section('title','Thêm mới thương hiệu')
@section('page','Thêm mới thương hiệu')
    

<form action="{{ route('brands.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Tên thương hiệu</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" >
        
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="description">Mô tả</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}" >
        
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

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Thêm
    </button>
</form>

    

@endsection