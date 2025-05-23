@extends('layouts.app')

@section('content')
@if($order)
    <h1>Order Confirmed!</h1>
    <p>Thank you, {{ $order->customer_name }}. Your order has been placed.</p>
    <h4>Order Summary</h4>
    <ul>
        @foreach($order->items as $item)
            <li>{{ $item->product->name }} x{{ $item->quantity }} - {{ $item->price * $item->quantity }} EGP</li>
        @endforeach
    </ul>
    <strong>Total: {{ $order->total }} EGP</strong>
@else
    <div class="alert alert-info">No order found.</div>
@endif
@endsection