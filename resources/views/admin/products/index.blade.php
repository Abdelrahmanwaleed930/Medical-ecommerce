@extends('layouts.app')

@section('content')
<h1>Products</h1>
<div class="mb-3">
    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary">Products</a>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-info">Orders</a>
</div>

<a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add Product</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th><th>Category</th><th>Price</th><th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category?->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('admin.products.logs', $product) }}" class="btn btn-sm btn-secondary">Logs</a>
                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection