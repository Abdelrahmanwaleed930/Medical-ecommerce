@extends('layouts.app')

@section('content')
<h1>Checkout</h1>
<form method="POST" action="{{ route('checkout.store') }}">
    @csrf
    <div class="mb-3">
        <label>Full Name</label>
        <input type="text" name="customer_name" class="form-control" required value="{{ old('customer_name') }}">
        @error('customer_name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required value="{{ old('phone') }}">
        @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Delivery Address</label>
        <input type="text" name="address" class="form-control" required value="{{ old('address') }}">
        @error('address') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <button class="btn btn-success">Place Order</button>
</form>
@endsection