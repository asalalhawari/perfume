@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <h1>Orders</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Add New Order</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Status</th>
                <th>Total Amount</th>
                <th>Order Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
