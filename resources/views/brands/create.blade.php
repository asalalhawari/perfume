<!-- resources/views/brands/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Brand</h1>
    <form action="{{ route('brands.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Brand Name</label>
            <input type="text" name="name" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
