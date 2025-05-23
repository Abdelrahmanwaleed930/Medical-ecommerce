@extends('layouts.app')

@section('content')
<h1>Order #{{ $order->id }}</h1>
<ul>
    <li><strong>Customer:</strong> {{ $order->customer_name }}</li>
    <li><strong>Phone:</strong> {{ $order->phone }}</li>
    <li><strong>Address:</strong> {{ $order->address }}</li>
    <li><strong>Total:</strong> {{ $order->total }}</li>
    <li><strong>Created At:</strong> {{ $order->created_at }}</li>
</ul>
<h3>Products Ordered</h3>
<ul>
    @foreach($order->items as $item)
        <li>{{ $item->product->name }} x{{ $item->quantity }} ({{ $item->price }} EGP each)</li>
    @endforeach
</ul>
@endsection