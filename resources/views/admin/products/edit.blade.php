@extends('layouts.app')

@section('content')
<h1>Edit Product</h1>
<form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
        @error('price') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value="">-- None --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @if(old('category_id', $product->category_id) == $cat->id) selected @endif>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Image (optional)</label>
        <input type="file" name="image" class="form-control">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="80">
        @endif
        @error('image') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection