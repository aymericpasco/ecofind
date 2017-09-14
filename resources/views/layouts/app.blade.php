<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/leaf-1x1.png') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar container">
    <div class="navbar-brand">
        <a class="navbar-item logo" href="#">
            <img src="{{ asset('img/leaf.png') }}" alt="Bulma: a modern CSS framework based on Flexbox" >
            Ecofind
        </a>

        <div class="navbar-burger burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navMenu" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item discover" href="#">
                Découvrez
            </a>
            <a class="navbar-item" href="#">
                À Propos
            </a>
        </div>
        <div class="navbar-end">
            @guest
                <a class="navbar-item is-hidden-desktop-only" href="{{ url('/auth/facebook') }}">
                <span class="icon" style="color: #00d1b2;">
                  <i class="fa fa-facebook"></i>
                </span>
                    <span>Login</span>
                </a>
            @else
                <a class="navbar-item is-hidden-desktop-only" href="{{ url('/logout') }}">
                    <span>Logout</span>
                </a>
            @endguest
        </div>
    </div>
</nav>

        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('') }}"></script>
</body>
</html>
