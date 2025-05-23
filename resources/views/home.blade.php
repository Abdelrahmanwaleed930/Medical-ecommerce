@extends('layouts.app')

@section('content')
<h1>Medical Products</h1>
<div class="row">
@foreach($products as $product)
    <div class="col-md-3 mb-4">
        <div class="card">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            @endif
            <div class="card-body">
                <h5>{{ $product->name }}</h5>
                <p>{{ $product->price }} EGP</p>
                <form method="POST" action="{{ route('cart.add', $product->id) }}">
                    @csrf
                    <button class="btn btn-primary btn-sm">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
</div>
{{ $products->links() }}
@endsection