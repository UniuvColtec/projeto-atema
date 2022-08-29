@extends('web.base.page')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <style>
        .btn-download-foto {
            padding: 1px 5px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
            text-decoration: none;
        }
        .gallery-item {
            width: 100%;
        }
        .grid-gallery {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-column-gap: 10px;
            /*border: solid dimgray 3px;
            border-radius: 5px;*/
        }
    </style>
@endpush
@push('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush
@section('content')


    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2>{{ $event->name }}</h2>
                <p style="color: darkgray; margin: 0">{{ $event->subtitle}}
                    @foreach($event_categories as $event_category)
                        @if($event_category->event_id == $event->id)
                            @foreach($categories as $category)
                                @if($event_category->category_id == $category->id)
                                    {{ $category->typical_food_images }}
                                    <span class="badge rounded-pill text" style="background-color: var(--ci-color-green)" >{{ $category->name }}</span>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </p>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column flex-lg-row justify-content-between gap-2 gap-md-0 mt-3 mt-lg-0">
                <div class="d-flex align-items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#FFBB13"
                         class="bi bi-calendar2-week-fill" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zM8.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM3 10.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                    </svg>
                    <span>{{ $event->show_date}}</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#FFBB13" class="bi bi-map-fill"
                         viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z"/>
                    </svg>
                    <span>{{ $event->city->name . ' - ' . $event->city->state }}</span>
                </div>
            </div>
        </div>


        <div class="row my-5">
            <div class="col-12 col-xl-6">
                <div id="sliderEvento" class="carousel slide w-100 sliderEvento" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#sliderEvento" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#sliderEvento" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('files/' . $event->firstImage->image->address) }}" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('files/' . $event->firstImage->image->address) }}" class="d-block w-100" alt="">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#sliderEvento"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#sliderEvento"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>



            <div class="col-12 col-xl-6 py-2 mt-3 mt-lg-0">
                <div class="d-flex justify-content-between col-7 gap-4">
                    <div class="d-flex align-items-center gap-1 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D"
                             class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>
                        {{ $event->contact }}
                    </div>
                </div>
                <a href="{{ $event->website }}" target="_blank" class="px-4">
                    <div class="d-flex align-items-center gap-1 text-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D"
                             class="bi bi-globe" viewBox="0 0 16 16">
                            <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                        </svg>
                        {{ $event->website }}
                    </div>
                </a>
                <div class="d-flex align-items-center gap-1 text-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-geo-alt"
                         viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    {{ $event->address }}, {{ $event->district }}
                    <button type="button" class="btn " style="color: var(--ci-color-green)"  data-toggle="modal" data-target="#mapModal">
                        Mapa
                    </button>
                    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mapModalLongTitle">Localização</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {!! $event->renderMap($event->latitude, $event->longitude) !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn " style="color: var(--ci-color-green)"  data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-justify my-4"> {!!$event->description!!}</div>
                <button type="button" class="btn "  style="color: var(--ci-color-green)"  data-toggle="modal" data-target="#imageModal">
                    Galeria de Imagens
                </button>
                <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLongTitle">Galeria de Imagens</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class='grid-gallery'>
                                    @foreach($event->images as $image)
                                        <div class='grid-gallery-item'>
                                            <a href='{{ asset('files/' . $image->image->address) }}' class='btn-download-foto' download>
                                                <small><span class='fas fa-download'></span></small>
                                            </a>
                                            <br>
                                            <img src='{{ asset('files/' . $image->image->address) }}' data-src='{{ asset('files/' . $image->image->address) }}' class='img-responsive mklbItem gallery-item' data-gallery='myGallery'>
                                            <br>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn " style="color: var(--ci-color-green)"  data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#" class="btn-cta-contato py-2 px-3 my-2" style="color: var(--ci-color-green)" >Entre em contato com a organização</a>
            </div>
        </div>



        <div class="row my-sm-5">
            <div class="col-12 col-md-6 col-lg-4 my-2 my-lg-0">
                <div class="card p-4 d-flex justify-content-between">
                    <h4 class="text-center">Comidas Típicas</h4>
                    <div class="accordion accordion-flush" id="comidas-tipicas-loop-container">
                        <div class="accordion-item">
                            @foreach($typical_event_foods as $typical_event_food)
                                @if($typical_event_food->event_id == $event->id)
                                    @foreach($typical_foods as $typical_food)
                                        @if($typical_event_food->typical_food_id == $typical_food->id)
                                            <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#comidas-tipicas-loop-item-{{ $typical_food->id }}" aria-expanded="false"
                                                    aria-controls="comidas-tipicas-loop-item-{{ $typical_food->id }}">
                                                {{ $typical_food->name }}
                                            </button>
                                            </h2>
                                            <div id="comidas-tipicas-loop-item-{{ $typical_food->id }}" class="accordion-collapse collapse"
                                                 aria-labelledby="panelsStayOpen-headingOne">
                                                <div class="accordion-body">
                                                    <img src="assets/img/interna-eventos/comida-tipica.jpg" class="img-fluid" alt="">
                                                    <p class="mt-2">{{ $typical_food->description }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                        </div>
                    </div>
                    <a href="{{ route('web.typicalfood') }}" class="mt-3 text-center"><small>Ver mais</small></a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 my-2 my-lg-0">
                <div class="card p-4 d-flex justify-content-between">
                    <h4 class="text-center">Turismo Local</h4>
                    <div class="accordion accordion-flush" id="turismo-local-loop-container">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#turismo-local-loop-item-1" aria-expanded="false"
                                        aria-controls="turismo-local-loop-item-1">
                                    Ponto turístico 1
                                </button>
                            </h2>
                            <div id="turismo-local-loop-item-1" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <img src="assets/img/interna-eventos/ponto-turistico.jpg" class="img-fluid" alt="">
                                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                                        condimentum eu dolor bibendum ultricies.
                                        Donec molestie consectetur accumsan. Donec faucibus elit nec congue
                                        ullamcorper.</p>
                                    <p class="d-flex gap-2 align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg> Rua Tal de Tal, 290 - Centro
                                    </p>
                                    <p class="d-flex gap-2 align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-map" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                        </svg> Rotas
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#turismo-local-loop-item-2" aria-expanded="false"
                                        aria-controls="turismo-local-loop-item-2">
                                    Ponto turístico 2
                                </button>
                            </h2>
                            <div id="turismo-local-loop-item-2" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <img src="assets/img/interna-eventos/ponto-turistico.jpg" class="img-fluid" alt="">
                                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                                        condimentum eu dolor bibendum ultricies.
                                        Donec molestie consectetur accumsan. Donec faucibus elit nec congue
                                        ullamcorper.</p>
                                    <p class="d-flex gap-2 align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg> Rua Tal de Tal, 290 - Centro
                                    </p>
                                    <p class="d-flex gap-2 align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-map" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                        </svg> Rotas
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#turismo-local-loop-item-3" aria-expanded="false"
                                        aria-controls="turismo-local-loop-item-3">
                                    Ponto turístico 3
                                </button>
                            </h2>
                            <div id="turismo-local-loop-item-3" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <img src="assets/img/interna-eventos/ponto-turistico.jpg" class="img-fluid" alt="">
                                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                                        condimentum eu dolor bibendum ultricies.
                                        Donec molestie consectetur accumsan. Donec faucibus elit nec congue
                                        ullamcorper.</p>
                                    <p class="d-flex gap-2 align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg> Rua Tal de Tal, 290 - Centro
                                    </p>
                                    <p class="d-flex gap-2 align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-map" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                        </svg> Rotas
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('web.touristspot') }}" class="mt-3 text-center"><small>Ver mais</small></a>
                </div>
            </div>
            <div class="col-12 col-lg-4 my-2 my-lg-0">
                <div class="card p-4 d-flex justify-content-between">
                    <h4 class="text-center">Parceiros</h4>
                    <div class="accordion accordion-flush" id="parceiros-loop-container">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed d-flex gap-2" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#parceiros-loop-item-1"
                                        aria-expanded="false" aria-controls="parceiros-loop-item-1">
                                    Parceiro 1 <span class="badge rounded-pill text" style="background-color: var(--ci-color-green)" >Hotel</span>
                                </button>
                            </h2>
                            <div id="parceiros-loop-item-1" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                                        condimentum eu dolor bibendum ultricies.
                                        Donec molestie consectetur accumsan. Donec faucibus elit nec congue
                                        ullamcorper.</p>
                                    <p class="d-flex gap-2 align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg> Rua Tal de Tal, 290 - Centro
                                    </p>
                                    <div class="d-flex gap-4">
                                        <p class="d-flex gap-2 align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-telephone" viewBox="0 0 16 16">
                                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                            </svg> (42) 3521 2050
                                        </p>
                                        <a href="#">
                                            <p class="d-flex gap-2 align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-globe" viewBox="0 0 16 16">
                                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                                                </svg> Website
                                            </p>
                                        </a>
                                    </div>
                                    <a href="#">
                                        <p class="d-flex gap-2 align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-map" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                            </svg> Rotas
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed d-flex gap-2" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#parceiros-loop-item-2"
                                        aria-expanded="false" aria-controls="parceiros-loop-item-2">
                                    Parceiro 2 <span class="badge rounded-pill text" style="background-color: var(--ci-color-green)" >Restaurante</span>
                                </button>
                            </h2>
                            <div id="parceiros-loop-item-2" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                                        condimentum eu dolor bibendum ultricies.
                                        Donec molestie consectetur accumsan. Donec faucibus elit nec congue
                                        ullamcorper.</p>
                                    <p class="d-flex gap-2 align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg> Rua Tal de Tal, 290 - Centro
                                    </p>
                                    <div class="d-flex gap-4">
                                        <p class="d-flex gap-2 align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-telephone" viewBox="0 0 16 16">
                                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                            </svg> (42) 3521 2050
                                        </p>
                                        <a href="#">
                                            <p class="d-flex gap-2 align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-globe" viewBox="0 0 16 16">
                                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                                                </svg> Website
                                            </p>
                                        </a>
                                    </div>
                                    <a href="#">
                                        <p class="d-flex gap-2 align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-map" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                            </svg> Rotas
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed d-flex gap-2" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#parceiros-loop-item-3"
                                        aria-expanded="false" aria-controls="parceiros-loop-item-3">
                                    Parceiro 3 <span class="badge rounded-pill text" style="background-color: var(--ci-color-green)" >Conveniência</span>
                                </button>
                            </h2>
                            <div id="parceiros-loop-item-3" class="accordion-collapse collapse"
                                 aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                                        condimentum eu dolor bibendum ultricies.
                                        Donec molestie consectetur accumsan. Donec faucibus elit nec congue
                                        ullamcorper.</p>
                                    <p class="d-flex gap-2 align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg> Rua Tal de Tal, 290 - Centro
                                    </p>
                                    <div class="d-flex gap-4">
                                        <p class="d-flex gap-2 align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-telephone" viewBox="0 0 16 16">
                                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                            </svg> (42) 3521 2050
                                        </p>
                                        <a href="#">
                                            <p class="d-flex gap-2 align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-globe" viewBox="0 0 16 16">
                                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                                                </svg> Website
                                            </p>
                                        </a>
                                    </div>
                                    <a href="#">
                                        <p class="d-flex gap-2 align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-map" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                            </svg> Rotas
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('web.partner') }}" class="mt-3 text-center"><small>Ver mais</small></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
</main>
@stop
