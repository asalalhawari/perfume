<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Product</h1>
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" required class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" required class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" step="0.01" value="{{ $product->price }}" required class="form-control">
            </div>

            <div class="form-group">
                <label for="stock_quantity">Stock Quantity</label>
                <input type="number" name="stock_quantity" value="{{ $product->stock_quantity }}" required class="form-control">
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="brand_id">Brand</label>
                <select name="brand_id" class="form-control">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
