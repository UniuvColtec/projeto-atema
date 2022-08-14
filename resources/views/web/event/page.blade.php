@extends('web.event.master')

@section('css')
    @stack('css')
    @yield('css')
@stop

@section('body')
    @include('web.event.header')


    @yield('content')

    @include('web.event.footer')
@stop

@section('js')
    @stack('js')
    @yield('js')
@stop
