@extends('layouts.app');
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <img src="/avatars/{{ Auth::user()->avatar }}" style="width:200px;margin-top: 10px; border-radius: 50%">
        </div>
        <h1 class="text-center mb-5">hallo User {{ Auth::user()->name }}</h1>
        <div class="row justify-content-center mb-5">
            <div class="col-8">
                <a class="btn btn-primary d-block w100" href="{{ route('userproduct.index') }}"> show all products</a>
            </div>
        </div>

    </div>
@endsection
