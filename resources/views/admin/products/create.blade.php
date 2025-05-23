@extends('layouts.app')

@section('content')
<h1>Add Product</h1>
<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ old('price') }}">
        @error('price') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value="">-- None --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @if(old('category_id') == $cat->id) selected @endif>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Image (optional)</label>
        <input type="file" name="image" class="form-control">
        @error('image') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <button class="btn btn-success">Create</button>
</form>
@endsection