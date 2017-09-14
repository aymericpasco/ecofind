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
    <script src="{{ asset('js/turbolinks.js') }}"></script>

</head>
<body>

@yield('navbar')

@yield('content')

<!-- Scripts -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp0YwuMWioEzFiKeAV5XOy3LhicJQfC3I&libraries=places&sensor=true"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/maps.js') }}"></script>

</body>
</html>