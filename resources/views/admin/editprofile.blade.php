@extends('layouts.app')
@section('content')
    <div class="container my-5 mx-10 align-items-center">
        <form class="form-control" action="{{ route('admin.update',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <h3 class="text-center mb-2">Edit Your Profile</h3>
            <div class="mb-3 row">
                <label for="inputName" class="col-sm-1 col-form-label">Name</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="inputName" name="name"
                        value="{{ Auth::user()->name }}" class="@error('name') is-invalid @enderror">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPhone" class="col-sm-1 col-form-label">Phone</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="inputPhone" name="Phone"
                        value="{{ Auth::user()->Phone }}" class="@error('Phone') is-invalid @enderror">
                    @error('Phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputEmail" class="col-sm-1 col-form-label">Email</label>
                <div class="col-sm-11">
                    <input type="email" class="form-control" id="inputEmail" name="email"
                        value="{{ Auth::user()->email }}" class="@error('email') is-invalid @enderror">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-1 col-form-label">Password</label>
                <div class="col-sm-11">
                    <input type="password" class="form-control" id="inputPassword" name="password"
                        class="@error('password') is-invalid @enderror">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputImage" class="col-sm-1 col-form-label">Image</label>
                <div class="col-sm-11">
                    <input type="file" class="form-control" id="inputImage" name="avatar"
                        class="@error('avatar') is-invalid @enderror">
                    @error('avatar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-grid gap-2  mx-auto">
                <button type="submit" class="btn btn-success mb-3">Confirm Changes</button>
            </div>
        </form>

    </div>
@endsection
