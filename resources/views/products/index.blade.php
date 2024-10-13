<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create New Product</a>
        
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock_quantity }}</td>
                        <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                        <td>{{ $product->brand ? $product->brand->name : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
