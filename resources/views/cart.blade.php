@extends('layouts.app')

@section('content')
<h1>Your Cart</h1>
@if(empty($cart))
    <div class="alert alert-info">Your cart is empty.</div>
@else
    <form method="POST" action="{{ route('checkout.index') }}">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th><th>Qty</th><th>Price</th><th>Total</th><th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                @php $total += $item['price'] * $item['quantity']; @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>
                        <form method="POST" action="{{ route('cart.update', $id) }}" class="d-inline">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" style="width:50px;">
                            <button class="btn btn-sm btn-secondary">Update</button>
                        </form>
                    </td>
                    <td>{{ $item['price'] }} EGP</td>
                    <td>{{ $item['price'] * $item['quantity'] }} EGP</td>
                    <td>
                        <form method="POST" action="{{ route('cart.remove', $id) }}">
                            @csrf
                            <button class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div><strong>Total: {{ $total }} EGP</strong></div>
        <a href="{{ route('checkout.index') }}" class="btn btn-success mt-3">Checkout</a>
    </form>
@endif
@endsection