
@extends('admin.layouts.master')

@section('content')
@section('title','Thêm size')
@section('page','Thêm size')
    

<form action="{{ route('sizes.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Tên size</label>
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


    <button type="submit" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Thêm
    </button>
</form>

    

@endsection