@extends('web.base.page')

@section('slider')
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/img/slider-home/banner.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/img/slider-home/banner.png" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#home-banner-slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#home-banner-slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
    </button>
@stop

@section('content')
<main class="px-2 px-md-0 my-5">
    <div class="container py-3 home-action-buttons">
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 text-center px-2 justify-content-evenly">
            <a href="#">
                <div class="card h-100 py-3">
                    <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                        <img src="assets/img/botoes-home/calendario.svg" width="50">
                        <p class="m-0 p-0">Cadastrar<br>Evento</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('web.event.map') }}">
                <div class="card h-100 py-3">
                    <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                        <img src="assets/img/botoes-home/mapa-dos-eventos.svg" width="50">
                        <p class="m-0 p-0">Mapa dos<br>Eventos</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('web.partner') }}">
                <div class="card h-100 py-3">
                    <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                            <img src="assets/img/botoes-home/parceiros.svg" width="50">
                            <p class="m-0 p-0">Parceiros</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('web.typicalfood') }}">
                <div class="card h-100 py-3">
                    <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                        <img src="assets/img/botoes-home/comidas-tipicas.svg" width="50">
                        <p class="m-0 p-0">Comidas<br>Típicas</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('web.touristspot') }}">
                <div class="card h-100 py-3">
                    <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                        <img src="assets/img/botoes-home/turismo-local.svg" width="50">
                        <p class="m-0 p-0">Turismo<br>Local</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="container pb-4">
        <div class="row justify-content-between py-3">
            <h3 class="w-auto">Próximos Eventos</h3>
            <a href="{{ route('web.event') }}" class="w-auto" style="color: var(--ci-color-green)">Mostrar todos</a>
        </div>
        <div class="row row-cols-1 row-cols-md-3 home-proximos-eventos px-3 px-md-0">

            @foreach( $events as $event)
            <a class="my-3 m-md-0" href="{{ route('web.event.show', $event->id) }}">
                <div class="card h-100">
                    <img class="card-img-top w-100 h-auto" src="{{ asset('files/' . $event->firstImage->image->address) }}"
                         alt="{{ $event->name }}">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <div class="mt-2">
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                     class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                                {{ $event->city->name . ' - ' . $event->city->state }}
                            </p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-calendar" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
                                {{ $event->show_date }}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="container py-4">
        <div class="row justify-content-between py-3">
            <h3 class="w-auto">Calendário Anual</h3>
            <a href="#" class="w-auto" style="color: var(--ci-color-green)">Mostrar todos</a>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 justify-content-evenly justify-content-lg-between calendario-anual-container">
            <a class="" href="#">
                <div class="card h-100">
                    <img class="card-img-top w-100 h-auto" src="assets/img/calendario-anual-1.jpg"
                         alt="">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <h5 class="card-title">Festa das etnias</h5>
                        <div class="mt-2">
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                     class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
Porto União - SC
</p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-calendar" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
25 de agosto
</p>
                        </div>
                    </div>
                </div>
            </a>
            <a class="" href="#">
                <div class="card h-100">
                    <img class="card-img-top" src="assets/img/calendario-anual-2.jpg"
                         alt="Card image cap">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <h5 class="card-title">Festa da Erva Mate</h5>
                        <div class="mt-2">
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                     class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
Bituruna - PR
                            </p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-calendar" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
19 de maio
</p>
                        </div>
                    </div>
                </div>
            </a>
            <a class="" href="#">
                <div class="card h-100">
                    <img class="card-img-top" src="assets/img/calendario-anual-3.jpg"
                         alt="Card image cap">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <h5 class="card-title">Einwander Fest</h5>
                        <div class="mt-2">
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                     class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
Bituruna - PR
                            </p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-calendar" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
19 de maio
</p>
                        </div>
                    </div>
                </div>
            </a>
            <a class="" href="#">
                <div class="card h-100">
                    <img class="card-img-top" src="assets/img/calendario-anual-4.jpg"
                         alt="Card image cap">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <h5 class="card-title">Festa do Steinhaeguer</h5>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                 class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
Bituruna - PR
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-calendar" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
19 de maio
</p>
                    </div>
                </div>
            </a>
            <a class="" href="#">
                <div class="card h-100">
                    <img class="card-img-top" src="assets/img/calendario-anual-5.jpg"
                         alt="Card image cap">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <h5 class="card-title">Caminhada da Natureza</h5>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                 class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
Bituruna - PR
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-calendar" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
19 de maio
</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</main>
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

@stop
