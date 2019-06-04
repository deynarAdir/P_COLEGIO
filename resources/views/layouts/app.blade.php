<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="Shortcut Icon" type="image/x-icon" href="{!! asset('assets/assets/icons/book.ico') !!}" />
    {{-- <script src="{!! asset('assets/js/sweet-alert.min.js') !!}"></script> --}}
    <link rel="stylesheet" href="{!! asset('assets/css/sweet-alert.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/material-design-iconic-font.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/normalize.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/jquery.mCustomScrollbar.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/autocomplete/jquery-ui.css') !!}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="{!! asset('assets/autocomplete/jquery-ui.min.js') !!}"></script>
    <script src="{!! asset('assets/js/modernizr.js') !!}"></script>
    <script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.mCustomScrollbar.concat.min.js') !!}"></script>
    <script src="{!! asset('assets/js/main.js') !!}"></script>
    
    
</head>
<body>
    @include('layouts.leftNavigation')
    <div class="content-page-container full-reset custom-scroll-containers">
        @include('layouts.topNavigation')
            
        @yield('content')

        @include('layouts.footer')
    </div>
    @section('scripts')
    @show
</body>
</html>