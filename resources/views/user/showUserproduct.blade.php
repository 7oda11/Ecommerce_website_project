@extends('layouts.app')
@section('content')
    <div class="container p-3">
        <div class="card">
            @if ($oneproduct->product_picture)
                <img src="/product_picture/{{ $oneproduct->product_picture }}" class="card-img-top small " alt="Image Here" style="height: 300px; border-radius: 50% "/>
            @else
                <p class="text-center card-title"> there is no image for this product</p>
            @endif
            <div class="card-body">
                <h4 class="card-title text-center">Product Name:{{ $oneproduct->product_name }}</h4>
                <h5 class="card-text">Product Price:{{ $oneproduct->product_price }}</h5>
                <p class="card-text">Category Name:{{ $oneproduct->Category->name }}</p>
                <p class="card-text">Product Availability: {{ $oneproduct->product_availability }}</p>
            </div>
        </div>
    </div>
@endsection
{{-- action="{{ route('deleteproduct', $product->id) }}" --}}
@extends('layouts.button')
