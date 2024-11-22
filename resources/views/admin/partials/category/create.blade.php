
@extends('admin.layouts.master')

@section('content')
@section('title','Thêm mới danh mục')
@section('page','Thêm mới danh mục')
    

<form action="{{ route('categorys.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Tên danh mục</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" >
        
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>



    <button type="submit" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Thêm
    </button>
</form>

    

@endsection