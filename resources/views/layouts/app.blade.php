<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

        @include('_includes.nav.main')

        <div id="app">
          @yield('content')        
        </div>
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
            $(function () {
                $('.confirm').on('click', function (e) {
                    e.preventDefault();
                    var linkLocation = $(this).attr('href');
        
                    alertify.okBtn("Yes")
                        .cancelBtn("No")
                        .confirm("Are you sure you want to perform this action?", function () {
                            window.location = linkLocation;
                        });
                });
            });
        </script>
    @yield('vue')
    @stack('scripts')
</body>
</html>