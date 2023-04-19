<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trinket Boutique</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=cardo:400,700|josefin-sans:300,300i" rel="stylesheet">
    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar bg-light navbar-expand-lg shadow-sm sticky-top align-items-center">
            <div class="container">
                <a class="text-decoration-none text-black" href="{{ url('/home') }}">
                    <h1 class="fs-5 me-5 pt-2">Trinket Boutique</h1>
                </a>
                {{--    <img src="{{ asset('storage/images/LOGO.png') }}" class="rounded-2 me-3" style="width:100px;"
                    alt="..." /> --}}


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        <li>
                            <form class="d-flex " role="search">
                                <input class="form-control me-2 text-center" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-light" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item me-2">
                            <a href="{{ route('admin.jewellery.create') }}" class="btn btn-light"><i
                                    class="bi bi-upload"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-light" href="{{ route('admin.shopping.cart') }}"><i class="bi bi-cart2"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/orders') }}">Previous Orders</a>
                        </li>

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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pb-4">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="text-white py-4">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna
                        </p>
                        <div class="d-flex">
                            <div class="col-7 pe-1">
                                <!-- Email input -->
                                <input type="email" class="form-control bg-transparent text-white"
                                    placeholder="your email" />
                            </div>
                            <div class="">
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-outline-light mb-4">
                                    Subscribe
                                </button>
                            </div>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim
                            ad minim. Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do.
                        </p>
                    </div>
                    <div class="col-lg-5">
                        <div class="mb-3">
                            <div class="row g-0 d-flex align-items-center">
                                <div class="col-lg-6 d-flex">
                                    <ul class="">
                                        <li class="lead">Our global Locations:</li>
                                        <li><a href="#">Dublin</a></li>
                                        <li><a href="#">Lisbon</a></li>
                                        <li><a href="#">Vancouver</a></li>
                                        <li><a href="#">New York</a></li>
                                </div>
                                <div class="col-lg-6 ">
                                    <img src="{{ asset('storage/images/LOGO.png') }}"
                                        class="img-fluid w-100 rounded-5" alt="..." />
                                </div>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-7">
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor ut labore et dolore magna labore.</span>
                        </div>
                        <div class="col-lg-5 pt-1">
                            <p class="text-end">
                                © 2020 Copyright: <a href="#">Trinket Boutique</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
