@extends('layouts.app')

@section('content')
<h1>Product Logs for "{{ $product->name }}"</h1>

<a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary mb-3">Back to Products</a>
<a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning mb-3">Edit Product</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Action</th>
            <th>Changed By</th>
            <th>Changes</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($logs as $log)
        <tr>
            <td>{{ $log->action }}</td>
            <td>{{ $log->changed_by }}</td>
            <td>
                <pre>{{ json_encode($log->changes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
            </td>
            <td>{{ $log->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No logs for this product yet.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection