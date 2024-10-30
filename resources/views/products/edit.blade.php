<!-- resources/views/products/edit.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1 class="my-4 text-center text-primary">Edit Product</h1>
        <form action="{{ route('products.update', $product) }}" method="POST" class="bg-light p-4 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" required class="form-control" placeholder="Enter product name">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" required class="form-control" rows="4" placeholder="Enter product description">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price ($)</label>
                <input type="number" name="price" step="0.01" value="{{ $product->price }}" required class="form-control" placeholder="Enter price">
            </div>

            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Stock Quantity</label>
                <input type="number" name="stock_quantity" value="{{ $product->stock_quantity }}" required class="form-control" placeholder="Enter stock quantity">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" class="form-select" required>
                    <option value="" disabled selected>Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="brand_id" class="form-label">Brand</label>
                <select name="brand_id" class="form-select" required>
                    <option value="" disabled selected>Select brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
