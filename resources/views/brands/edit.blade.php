<!-- resources/views/brands/edit.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>Edit Brand</h1>
        <form action="{{ route('brands.update', $brand) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Brand Name</label>
                <input type="text" name="name" class="form-control" value="{{ $brand->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('brands.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
