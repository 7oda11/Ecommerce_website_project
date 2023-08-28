@extends('layouts.app');
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <img src="/avatars/{{ Auth::user()->avatar }}" style="width:200px;margin-top: 10px; border-radius: 50%">
        </div>
        <h1 class="text-center mb-5">hallo Admin {{ Auth::user()->name }}</h1>

        <div class="row justify-content-center mb-5">
            <div class="col-8">
                <button type="button" class="btn btn-success d-block w-100" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    Insert Product
                </button>
            </div>
        </div>

    </div>
    {{-- start of the modal --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-bg-dark text-center">
                    <h1 class="modal-title fs-5 " id="employeeEdit">Insert Product</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 m-1">
                    {{-- start the form --}}
                    <form action="{{ route('product_admin.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row gx-3">
                            <div class="col-md-6 mb-3">
                                <input type="text" placeholder="Product Name" class="form-control form-control-sm"
                                    name="product_name" class="@error('product_name') is-invalid @enderror" />
                                @error('product_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" placeholder="Product Price" class="form-control form-control-sm"
                                    name="product_price" class="@error('product_price') is-invalid @enderror" />
                                @error('product_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Product Image</label>
                                <input class="form-control" type="file" id="formFile" name="product_picture"
                                    accept="image/*" class="@error('product_picture') is-invalid @enderror" />
                                @error('product_picture')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="Product_availability" class="form-label">Product availability</label>
                                <select class="form-select form-select-sm" id="Product_availability"
                                    name="product_availability" class="@error('product_availability') is-invalid @enderror">
                                    <option value="available">In Stock</option>
                                    <option value="unavailable">Out of Stock</option>
                                </select>
                                @error('product_availability')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="Category_Name" class="form-label">Category Name </label>
                                <select class="form-select form-select-sm" id="Category_Name" name="category_id"
                                    class="@error('category_id') is-invalid @enderror">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-10 d-flex">
                                <button type="submit" class="btn btn-sm btn-success flex-fill">
                                    Insert Product
                                </button>

                            </div>
                            <div class="col-md-2 d-flex">
                                <button type="button" class="btn btn-sm btn-warning flex-fill" data-bs-dismiss="modal">
                                    Discard
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end of the modal --}}
@endsection
