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

    <main class="px-2 px-md-0 my-5">
        @include('web.base.actions')
        @yield('content')
    </main>

    @yield('post_content')


    @include('web.base.footer')
@stop

@section('js')
    @stack('js')
    @yield('js')
@stop
