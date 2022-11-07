<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin=""/>

    <style>
        #location-map{
            background: #fff;
            border: none;
            height: 100vh;
            width: 100vw;

            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        body {
            margin: 0;
        }
        .logo {
            position: fixed;
            top: 1rem; left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
        }
        .logo {
            background-color: whitesmoke;
            border: lightgray 0.1rem solid;
            border-radius: 10px;
            padding: 0.5rem;
        }
    </style>
</head>
<body>
<div id="location-map">
    <div class="logo">
        <a href="/">
            <img src="{{ asset('assets/img/calendario-integrado-logo.png') }}" alt="Calendário Integrado" class="img-fluid">
        </a>
    </div>
</div>

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
        .bindPopup('<a href="/evento/{{ $point->id }}" style="text-decoration:none;">{{$point->name}}</a>');
    @endforeach

    L.marker([-26.2419993, -51.0913358]).addTo(map);
</script>

</body>
</html>
