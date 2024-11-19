
@extends('admin.layouts.master')

@section('content')
@section('title','Add Categorys')
    

<form action="{{ route('categorys.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" >
        
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>



    <button type="submit" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Create
    </button>
</form>

    

@endsection