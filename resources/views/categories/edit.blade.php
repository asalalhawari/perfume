<!-- resources/views/categories/edit.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Category</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection
