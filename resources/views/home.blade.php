@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin=""/>

        <style>
            #location-map{
                background: #fff;
                border: none;
                height: 85vh;
                width: 100%;

                box-sizing: border-box;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
            }
        </style>
    </head>
    <body>
    <div id="location-map"></div>

    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>

    <script type="text/javascript">
        var map = L.map('location-map').setView([	-26.136232290975514, -50.83935835272462], 10);
        mapLink = '<a href="https://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; ' + mapLink,
                maxZoom: 20,
            }).addTo(map);
        @foreach($points as $point)

        L.marker([{{ $point->lat }}, {{ $point->long }}]).addTo(map)
            .bindPopup('<a href="/admin/event/{{ $point->id }}" style="text-decoration:none;">{{$point->name}}</a>');
        @endforeach

        L.marker([-26.2419993, -51.0913358]).addTo(map);
    </script>

    </body>
@stop
