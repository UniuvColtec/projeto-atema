<!doctype html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- Title --}}
    <title>
        @yield('title_prefix', '')
        @yield('title', 'Calendário Integrado')
        @yield('title_postfix', '')
    </title>

    {{-- Custom stylesheets (pre AdminLTE) --}}
    @yield('css_pre')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('assets/bootstrap/bootstrap-min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/home.css') }}" rel="stylesheet">

    {{-- Custom Stylesheets (post AdminLTE) --}}
    @yield('css')

    <link rel="icon" type="image/x-icon" href="favicon.svg">
</head>
<body>

@yield('body')

<script src="{{ asset('assets/bootstrap/bootstrap-bundle-min.js') }}"></script>

@yield('js')

</body>
</html>
