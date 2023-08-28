<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lavel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand  navbar-light bg-white shadow-sm ">
            <div class="container">
                <a class="navbar-brand" href="{{ Route('home') }}">

                    {{ 'Ecommerce' }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('home') }}" class="btn btn-info d-block w-100 mb-1">Home</a>
                                    {{-- this is the button go to profile page --}}
                                    @if (auth()->user()->is_admin == 1)
                                        <a href="{{ route('admin.index') }}"
                                            class="btn btn-primary d-block w-100 mb-1">profile</a>
                                    @else
                                        <a href="{{ route('user.index') }}"
                                            class="btn btn-primary d-block w-100 mb-1">profile</a>
                                    @endif
                                    {{-- another navbar --}}
                                    {{-- firt inside navbar ********************************* --}}
                            <li class="nav-item dropdown px-5">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Categories
                                </a>
                                @if (auth()->user()->is_admin == 1)
                                    <ul class="dropdown-menu dropdown-menu">
                                        <h5 class="text-center">User</h5>
                                        <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.index') }}">Profile</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <h5 class="text-center">Product</h5>
                                            <a class="dropdown-item" href="{{ route('product_admin.index') }}">Show All
                                                Product</a>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="dropdown-menu dropdown-menu">
                                    <h5 class="text-center">User</h5>
                                    <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.index') }}">Profile</a></li>
                                    <li><a class="dropdown-item"href="{{ route('product') }}">Your Product</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <h5 class="text-center">Product</h5>
                                    <li><a class="dropdown-item" href="{{ route('userproduct.index') }}">Show All Product</a>
                                    </li>
                                </ul>
                                @endif
                            </li>
                            {{-- end inside navbar ****************************************** --}}

                            <a class="dropdown-item d-block w-100 p-0 m-0" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                <span class="btn btn-danger w-100 d-block"> {{ __('Logout') }} </span>

                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </div>
                    </li>
                @endguest
                </ul>
            </div>
            {{-- first Offcanvas navbar --}}



    </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    </div>



</body>

</html>
