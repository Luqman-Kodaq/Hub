<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Content Hub @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('bower_components/MDB/css/mdb.min.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div id="app">
            <div class="container">
            @yield('content')
            <app></app>        
        </div>
    </div>
    @yield('vue')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('bower_components/scrollreveal/dist/scrollreveal.min.js') }}"></script>
    <script>
        window.sr = ScrollReveal();
        sr.reveal('#loginContainer', {
            duration: 2000,
            origin: 'top'
        });
        sr.reveal('#registerContainer', {
            duration: 2000,
            origin: 'top'
        });
    </script>
    {{-- <script>
        window.App = {!! json_encode([
            'user' => Auth::user(),
            'image' => "{{ asset('uploads/post_photo/1528623742.jpeg') }}"
        ]) !!}
    </script> --}}
</body>
</html>
