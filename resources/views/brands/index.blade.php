<!-- resources/views/brands/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Brands</h1>
        <a href="{{ route('brands.create') }}" class="btn btn-primary mb-3">Create New Brand</a>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <a href="{{ route('brands.edit', $brand) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('brands.destroy', $brand) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this brand?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
