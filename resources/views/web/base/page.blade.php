@extends('web.base.master')

@section('css')
    @stack('css')
    @yield('css')
@stop

@section('body')
    @include('web.base.header')

    @hasSection('slider')
        <div id="banner-slider" class="carousel slide" data-bs-touch="false" data-bs-ride="carousel">
            @yield('slider')
        </div>
    @endif

    @yield('content')

    @include('web.base.footer')
@stop

@section('js')
    @stack('js')
    @yield('js')
@stop
