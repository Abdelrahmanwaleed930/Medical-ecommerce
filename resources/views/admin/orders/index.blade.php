@extends('layouts.app')

@section('content')
<h1>Orders</h1>
<div class="mb-3">
    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary">Products</a>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-info">Orders</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Customer</th><th>Phone</th><th>Address</th><th>Total</th><th>Created</th><th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->total }}</td>
            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
            <td><a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-info">View</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $orders->links() }}
@endsection