@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <h1>Order Details</h1>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>Total Amount:</strong> ${{ $order->total_amount }}</p>
    <p><strong>Order Date:</strong> {{ $order->order_date }}</p>

    <h2>Items</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->price }}</td>
                    <td>${{ $item->quantity * $item->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
