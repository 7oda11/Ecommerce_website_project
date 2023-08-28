@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h2>Edit a New Product</h2>
        <form method="post" action="{{ route('product_admin.update',$product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" name="product_name"
                    class="form-control @error('product_name') is-invalid @enderror" value="{{ $product->product_name }}">
                @error('product_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="product_price">Product Price</label>
                <input type="number" id="product_price" name="product_price" step="0.01"
                    class="form-control @error('product_price') is-invalid @enderror" value="{{ $product->product_price }}">
                @error('product_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="product_availability">Product Availability</label>
                <select id="product_availability" name="product_availability"
                    class="form-control @error('product_availability') is-invalid @enderror">
                    <option value="available" @if ($product->product_availability == 'available') selected @endif>In Stock</option>
                    <option value="unavailable" @if ($product->product_availability == 'unavailable') selected @endif>Out of Stock
                    </option>
                </select>
                @error('product_availability')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="product_picture">Product Picture</label>
                <input type="file" id="product_picture" name="product_picture" accept="image/*"
                    class="form-control-file @error('product_picture') is-invalid @enderror" value="{{ $product->product_picture }}">
                @error('product_picture')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category ID</label>
                <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary d-block w-100">Submit</button>
        </form>

    </div>
@endsection
