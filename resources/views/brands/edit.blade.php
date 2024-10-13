<!-- resources/views/brands/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Brand</h1>
    <form action="{{ route('brands.update', $brand) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Brand Name</label>
            <input type="text" name="name" value="{{ $brand->name }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
