@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                            @csrf

                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="avatar"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>

                                <div class="col-md-6">
                                    <input id="avatar" type="file"
                                        class="form-control @error('avatar') is-invalid @enderror" name="avatar"
                                        value="{{ old('avatar') }}" required autocomplete="avatar">

                                    <img src="/avatars/{{ Auth::user()->avatar }}" style="width:80px;margin-top: 10px;">
                                    {{-- <p> {{ Auth::user()->name }} </p>
                                    <p> {{ Auth::user()->Phone }} </p> --}}

                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success d-block w-50">
                                        {{ __('Upload Profile') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card text-center shadow m-3" style="width: flex-fill">
                <div class="card-body">
                    <div class="text-center">
                        <img src="/avatars/{{ Auth::user()->avatar }}" class="mx-auto d-block w-25 h-25 mb-3" alt="..."
                            style="border: 10px solid #ccc" />
                    </div>
                    <h3 class="card-title mb-4">User Information</h3>

                    <h5 class="card-text mb-3"><strong>ID: </strong> <label>{{ Auth::user()->id }}</label></h5>
                    <h5 class="card-text mb-3">
                        <strong>User Name: </strong><label>{{ Auth::user()->name }}</label>
                    </h5>
                    <h5 class="card-text mb-3">
                        <strong>Phone: </strong><label>{{ Auth::user()->Phone }}</label>
                    </h5>
                    <h5 class="card-text mb-3">
                        <strong>Email: </strong><label>{{ Auth::user()->email }}</label>
                    </h5>
                    {{-- <a href="{{ route('userproduct') }}" class="btn btn-success btn-lg shadow mx-4 d-block mb-2">Show Your Product</a> --}}
                    <a href="{{ route('admin.edit',Auth::user()->id) }}" class="btn btn-warning btn-lg shadow mx-4 d-block">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
