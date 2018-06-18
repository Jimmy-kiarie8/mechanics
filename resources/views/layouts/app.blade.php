<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="manifest" href="{{ asset('js/manifest.json') }}">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Vuesume">
    <meta name="theme-color" content="#3273dc">
    <meta name="msapplication-navbutton-color" content="#3273dc">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/">

    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/bulma.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNzKeF6ZwxlAOUCyeH8UxvvYRHP_w_Guk&libraries=places"></script>
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> --}}
    <!-- Styles -->
    <link href="{{ asset('vuetify/css/vuetify.min.css') }}" rel="stylesheet">
    {{-- <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script> --}}


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('vuetify/js/vuetify.js') }}"></script>
</body>
</html>
