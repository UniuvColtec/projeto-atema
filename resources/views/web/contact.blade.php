@extends('web.base.page')


@section('content')

    <div class="container-md" style="background: var(--ci-color-green)">
        <div class="container py-5">
            <div class="row row-cols-1 row-cols-lg-2">
                <div class="container">
                    <div style="text-align: center">
                        <h4 class="text-white my-3 my-md-4 my-lg-5" >Telefone:<br>(42) 99122-9878</h4>
                        <h4 class="text-white my-3 my-md-4 my-lg-5" >Email:<br>atematurismo@gmail.com</h4>
                        <h4 class="text-white my-3 my-md-4 my-lg-5">Localização:<br>Rua Dom Pedro II, Nº 303, centro<br>União da Vitória - PR</h4>
                        <script src='https://maps.google.com/maps/api/js?key=AIzaSyDv7YRz1WWPhkr6aim8wEm4WDPBdk81z54'></script>

                        <div style="overflow: hidden;height: 280px;width: 100%;color: #0095eb">
                            <div id="gmap_canvas" style="height: 280px;width: 100%;"></div>
                            <style>#gmap_canvas img{max-width: none!important;background:none!important}</style>
                        </div>

                        <script type="text/javascript">
                            function init_map(){var myOptions= {zoom:15,center:new google.maps.LatLng(-26.2324284,-51.0917618),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById
                            ('gmap_canvas'), myOptions);marker = new google.maps.Maker({map: map,position: new google.maps.LatLng(-26.2324284,-51.0917618)});infowindow = new google.maps.InfoWindow({content: ' <img src="Site/assets/img/logoatema.png">'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindon.open(map,marker);}
                            google.maps.event.addDomListener(window, 'load', init_map);
                        </script>
                    </div>
                </div>
                <div class="container-sm"style="background-color: #98b54d">
                    <h1 class="u-text u-text-1" style="color: #ffffff; text-align: center
">Entre em contato conosco!</h1>
                    <form class="d-flex my-3 my-md-4 my-lg-5" role="search">
                        <input class="form-control rounded-3 bg-gray" type="search" placeholder="Seu nome" aria-label="Search">

                    </form>
                    <form class="d-flex my-3 my-md-4 my-lg-5" role="search">
                        <input class="form-control rounded-3 bg-gray" type="search" placeholder="Seu email" aria-label="Search">
                    </form>
                    <form class="d-flex my-3 my-md-4 my-lg-5" role="search">
                        <textarea rows="10" cols="40" maxlength="500" class="form-control rounded-3 bg-gray" type="search" placeholder="Deixe seu comentário" aria-label="Search"></textarea>
                    </form>
                    <form class="d-flex my-3 my-md-4 my-lg-5" role="search">
                        <button type="subimit" class="form-control rounded-3 bg-gray">Enviar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@stop
