@extends('layouts.app')

@section('title', 'Create New Order')

@section('content')
    <h1>Create New Order</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">Choose User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach ($users as $item)
                <option value="{{$item->id}}">
                    {{
                        $item->name
                    }}
                </option>
                @endforeach
                {{-- <option value="">Choose User</option> --}}
                {{-- @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach --}}
            </select>
        </div>
        
        
        

        <div class="form-group">
            <label for="status">Order Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="shipped">Shipped</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="total_amount">Total Amount</label>
            <input type="number" name="total_amount" id="total_amount" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="products">Select Products</label>
            <select name="products[]" id="products" class="form-control" multiple>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - ${{ $product->price }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
@endsection
