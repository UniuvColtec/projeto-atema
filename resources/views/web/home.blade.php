@extends('web.base.page')
<script>
    $(document).ready(function(){
        $('.carousel').carousel();
    });
</script>
@section('slider')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="position: relative;">
        <div class="carousel-inner" style="max-height: 586px;max-width:1918px">
            @if($banner[0]->images)
                @php $firstImage = true @endphp
                @foreach($banner[0]->images as $image)
                    <div class="carousel-item {{ $firstImage ? 'active' : '' }}">
                        <img src="{{ $image->image ? asset('files/' . $image->image->address) : '/images/none-image.png' }}" class="d-block w-100" alt="...">
                    </div>
                    @php $firstImage = false @endphp
                @endforeach
            @else
                <div class="carousel-item active">
                    <img src="assets/img/slider-home/banner.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/slider-home/banner.png" class="d-block w-100" alt="...">
                </div>
            @endif
        </div>
        <a class="carousel-control-prev color_next_prev" href="#carouselExampleControls" role="button" data-bs-slide="prev" style="position: absolute; top: 50%; left: 0; transform: translateY(-50%); z-index: 1; opacity: 0.2">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next color_next_prev" href="#carouselExampleControls" role="button" data-bs-slide="next" style="position: absolute; top: 50%; right: 0; transform: translateY(-50%); z-index: 1;opacity: 0.2">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>






@stop
@push('css')
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/showPage.css') }}" rel="stylesheet">
@endpush

@push('js')
    <script src=" {{ asset('resources/views/web/indexHome.js') }}" type="text/javascript"></script>
    <script src=" {{ asset('/js/carousel.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush
@section('content')
<div class="container pb-4">
    <div class="row justify-content-between py-3 m-3">
        <h3 class="w-auto">Próximos Eventos</h3>
        <a href="{{ route('web.event') }}" class="w-auto" style="color:   #0a8f72">Mostrar todos</a>
    </div>
    <div class="container text-center">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarouselNext" class="carousel carouselCalendario slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @php $firstEvent = true; @endphp
                    @foreach( $events as $event)
                    <div class="carousel-item  {{ $firstEvent ? 'active' : '' }}">
                        <div class="w-100 px-3 px-md-0">
                                <a class="my-3 m-md-0" href="{{ route('web.event.show', $event->id) }}">
                                    <div class="card h-100">
                                        <x-image  class="card-img-top w-100 h-auto" idImage="{{ $event->firstImage->image->id }}" altName="{{ $event->name }}" />
                                        <div class="card-body text-center d-flex flex-column justify-content-center">
                                            <h5 class="card-title">{{ $event->name }}</h5>
                                            <div class="mt-2">
                                                <p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                         class="bi bi-geo-alt color2_svg" viewBox="0 0 16 16">
                                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                    </svg>
                                                    {{ $event->city->name . ' - ' . $event->city->state }}
                                                </p>
                                                <p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         class="bi bi-calendar color2_svg" viewBox="0 0 16 16">
                                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                                    </svg>
                                                    {{ $event->show_date }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                        </div>
                    </div>
                        @php $firstEvent = false; @endphp
                    @endforeach
                </div>
                <a class="carousel-control-prev w-aut color_next_prev" href="#recipeCarouselNext" role="button" data-bs-slide="prev"  >
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next w-aut color_next_prev" href="#recipeCarouselNext" role="button" data-bs-slide="next"  >
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-between py-3 m-3">
        <h3 class="w-auto">Calendário Anual</h3>
        <button type="button" class="btn color1_text" data-toggle="modal" data-target="#exampleModal" style="color: #0a8f72; height: 32px; width: 200px">
            Pesquise por Data
        </button>
        <div class="modal row justify-content-between py-3" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesquise por Data:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="body">
                            <section class="section">
                                <form action="{{route('web.event')}}" method="GET">
                                    <div class="row valign-wrapper">
                                        <div class="form-group">
                                            <label for="date">Data:</label>
                                            <input type="date" name="dates" id="date" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn color1_button">
                                        Filtrar
                                    </button>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center my-3">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarouselAnual" class="carousel carouselAnual slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @php
                        $firstEvent = true;
                        $selectedMonth = isset($_GET['month']) ? $_GET['month'] : null; // Obtém o mês selecionado do filtro
                    @endphp
                    @foreach($annualevents as $event)
                        @php
                            $eventMonth = date('n', strtotime($event->show_date));
                        @endphp
                        @if (!$selectedMonth || $eventMonth == $selectedMonth) <!-- Aplica o filtro de mês -->
                        <div class="carousel-item {{ $firstEvent ? 'active' : '' }}">
                            <div class="w-100 px-3 px-md-0">
                                <a class="my-3 m-md-0" href="{{ route('web.event.show', $event->id) }}">
                                    <div class="card h-100">
                                        <x-image class="card-img-top w-100 h-auto" idImage="{{ $event->firstImage->image->id }}" altName="{{ $event->name }}" />
                                        <div class="card-body text-center d-flex flex-column justify-content-center">
                                            <h5 class="card-title">{{ $event->name }}</h5>
                                            <div class="mt-2">
                                                <p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-geo-alt color2_svg" viewBox="0 0 16 16">
                                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                    </svg>
                                                    {{ $event->city->name . ' - ' . $event->city->state }}
                                                </p>
                                                <p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-calendar color2_svg" viewBox="0 0 16 16">
                                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                                    </svg>
                                                    {{ $event->show_date }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endif
                        @php $firstEvent = false; @endphp
                    @endforeach
                </div>
                <a class="carousel-control-prev w-aut color_next_prev" href="#recipeCarouselAnual" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next w-aut color_next_prev" href="#recipeCarouselAnual" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>

@stop

@section('post_content')
    <div id="contato" class="container-fluid color1" >
        <div class="container py-5">
            <div class="row mt-4">
                <div class="col-6">
                    <img src="/assets/img/SulPR_logo_h_branca_transp.png" class="img-fluid w-25">
                    <img src="assets/img/atema-logo.png" class="img-fluid w-25">
                </div>
                <div class="col-6">
                    <p class="d-flex gap-2 align-items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg> (42) 3521 2050
                    </p>
                    <p class="d-flex gap-2 align-items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg> atematurismo@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="container-fluid" style="background: var(--ci-color-green)">
        <div class="container py-5">
            <div class="row row-cols-1 row-cols-lg-2">
                <h4 class="text-white my-3 my-md-4 my-lg-5">Cadastre-se na newsletter para ficar<br>informado sobre os
                    próximos eventos
                </h4>
                <form class="d-flex my-3 my-md-4 my-lg-5" role="search">
                    <input class="form-control rounded-5 bg-gray" type="search" placeholder="deixe seu e-mail aqui"
                           aria-label="Search">
                </form>
            </div>
        </div>
    </div>
    -->
@stop

