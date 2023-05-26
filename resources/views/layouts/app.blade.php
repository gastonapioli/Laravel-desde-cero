<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])




</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-body-secondary fixed-left shadow-xl p-2">

            <div class="container p-2">
                <a class="navbar-brand text-light-emphasis" href="{{"/"}}">
                    <img width="40rem" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/985px-Laravel.svg.png">
                    Laravel
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>


            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <hr class="border border-sucess border-2 opacity-100">
                        </li>
                    </ul>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('products.index') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('products.index') }}">Productos</a>
                        </li>
                        <hr>
                    </ul>
                    <div class="spinner-border loading" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav nav-pills flex-column mb-auto position-absolute bottom-0 translate-middle-y d-none d-md-block py-4">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav nav-pills flex-column mb-auto d-lg-none d-md-none">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
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

        <main class="p-4">

            <div class="container-fluid">
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{session()->get('error')}}
                </div>
                @endif
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>

                @endif
                @if(isset($errors) && $errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="loading container-fluid py-lg-3">
                    <p class="card-text placeholder-glow">
                        @for ($i = 0; $i < 10; $i++) <span class="placeholder-sm placeholder col-{{rand(1,12)}} bg-secondary"></span>
                            &nbsp; <span class="placeholder-sm placeholder col-{{rand(1,12)}}"></span>
                            &nbsp; <span class="placeholder-sm placeholder col-{{rand(1,12)}} bg-light"></span>
                            &nbsp; <span class="placeholder-sm placeholder col-{{rand(1,12)}} bg-secondary"></span>
                            &nbsp; <span class="placeholder-sm placeholder col-{{rand(1,12)}}"></span>
                            &nbsp; <span class="placeholder-sm placeholder col-{{rand(1,12)}} bg-secondary"></span>
                            &nbsp; <span class="placeholder-sm placeholder col-{{rand(1,12)}} bg-light"></span>
                            @endfor
                    </p>
                </div>
                <div class="animate__animated animate__fadeIn">
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="footer mt-auto py-3 bg-body-tertiary">
            <div class="container">
                <span class="text-body-secondary">Place sticky footer content here.</span>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        window.onload = function() {
            $(".loading").fadeToggle("fast");
        }

    </script>

    <script type="text/javascript">
        function btnLoad() {

            $('.btn').prop("disabled", true);
            $('.btn').addClass("btn-outline-light");
            $('.btn').html(
                `<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>  Cargando`

            );


        };

    </script>

</body>



</html>
