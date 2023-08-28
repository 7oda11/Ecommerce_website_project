@extends('layouts.app')
@section('content')
    <div class="container p-3">
        <form action="{{ route('productsearch') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search by name of Product" aria-label="Search"
                    aria-describedby="basic-addon2" name="product_name" />
                <button class="input-group-text" id="basic-addon2" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
        </form>
        <div class="row justify-content-center">
            <div class="col-8">
                <a href="{{ route('userproduct.index') }}" class="btn btn-warning d-block w-100 mb-3"> Reset</a>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-3">
            @if (count($products) === 0)
                <div class="col w-100">
                    <p class="text-center text-bold fs-3">No products that have the same name available</p>
                </div>
            @else
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card h-100">
                            @if ($product->product_picture)
                                <img src="/product_picture/{{ $product->product_picture }}" class="card-img-top"
                                    alt="image of product" style="border-radius: 50%" />
                            @else
                                <p class="text-center"> there is no image for this product</p>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $product->product_name }}</h5>
                                <p class="card-text">Product Price:{{ $product->product_price }}</p>
                                <p class="card-text">Product Availability: {{ $product->product_availability }}</p>
                                <p class="card-text"> Category Name: {{ $product->Category->name }}</p>

                            </div>
                            <div class="card-footer">
                                <form action="{{ route('userproduct.show', $product->id) }}" method="get">
                                    <button type="submit" class="btn btn-info d-block w-100 mb-1"> Show Product</button>
                                </form>
                                <form action="{{ route('updateProductTouser_id',$product->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-success d-block w-100 mb-1">Add to card</button>
                                </form>
                                {{-- <a href="#" class="btn btn-success d-block w-100 mb-1">Add to card</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>

    </div>
@endsection
@extends('layouts.button')

