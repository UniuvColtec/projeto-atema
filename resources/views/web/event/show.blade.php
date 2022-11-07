@extends('web.base.page')

@push('css')
    <link href="{{ asset('css/mklb.css') }}" rel="stylesheet">
    <link href="{{ asset('css/galeria.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/showPage.css') }}" rel="stylesheet">


@endpush
@push('js')
    <script src=" {{ asset('/js/minimasonry.min.js') }}" type="text/javascript"></script>
    <script src=" {{ asset('/js/mklb.js') }}" type="text/javascript"></script>
    <script src=" {{ asset('/js/carousel.js') }}" type="text/javascript"></script>
    <script>
        window.addEventListener("load", function(event) {
            var myLayout = new MiniMasonry({
                container: '.grid-gallery',
            });
        });
    </script>
@endpush
@section('content')
    <div class="container my-5">
        <div class="container main-content">
            <div class="banner-n-info-grid">
                @if($event->video != "")
                    <iframe width="560" height="315" src="{{ $event->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @else
                <img src="{{ $event->firstImage ? asset('files/' . $event->firstImage->image->address) : '/images/none-image.png' }}" class="d-block w-100" alt="{{ $event->name }}">
                @endif
                <div class="info-flex">
                    <div class="title-grid">
                        <div>
                            <p class="h4">{{ $event->name }} </p>
                            <p class="h6">{{ $event->subtitle}}</p>
                        </div>
                        <div class='grid-gallery'>
                            <div class="grid-gallery-item">
                                <img src="{{$event->getUrlLogo()}}" alt="{{ $event->name }}" class="img-thumbnail mklbItem" style="max-width: 64px; max-height: 64px;" data-gallery='myGallery'>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#FFBB13"
                             class="bi bi-calendar2-week-fill" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zM8.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM3 10.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                        </svg>
                        <span>O evento ocorrerá de {{ $event->show_date}}</span>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column flex-lg-row justify-content-between gap-2 gap-md-0 mt-3 mt-lg-0">
                        <div class="d-flex align-items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#FFBB13" class="bi bi-map-fill"
                                 viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z"/>
                            </svg>
                            <span class="badge rounded-pill text" style="background-color: var(--ci-color-green)" >{{ $event->city->name .' - '.$event->city->state}}</span>
                        </div>
                    </div>
                    <div class="types-display">
                        <div class="type-itens">
                            @foreach($event->event_category as $category)
                                <span class="badge rounded-pill text" style="background-color: var(--ci-color-green)"> {{ $category->category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-justify my-4">
                        {!!$event->description!!}
                    </div>
                </div>
            </div>
            @if(count($event->images)>0)
                <p class="h2">Galeria de Imagens</p>
                <div class='grid-gallery'>
                    @foreach($event->images as $image)
                        <div class='grid-gallery-item'>
                            <a href='{{ asset('files/' . $image->image->address) }}' class='btn-download-foto' download>
                                <small>
                                    <span class='fas fa-download'></span>
                                </small>
                            </a>
                            <br />
                            <img src='{{ asset('files/' . $image->image->address) }}' data-src='{{ asset('files/' . $image->image->address) }}' class='img-responsive mklbItem' data-gallery='myGallery'><br />
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="more-info">
                <p class="h2">Comidas Típicas</p>
                <div class="container text-center">
                    <div class="row mx-auto my-auto justify-content-center">
                        <div id="recipeCarouselNext" class="carousel carouselAnual slide" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                @php $firstImageFood = true; @endphp
                                @foreach( $event->typical_food as $typical_food)
                                    <div class="carousel-item  {{ $firstImageFood ? 'active' : '' }}">
                                        <div class="w-100 px-3 px-md-0">
                                            <a class="my-3 m-md-0" href="{{ route('web.typicalfood.show', $typical_food->typical_food->id) }}">
                                                <div class="card h-100">
                                                    <img class="card-img-top w-100 h-auto" src="{{ asset('files/' . $typical_food->typical_food->firstImage->image->address) }}"
                                                         alt="{{ $typical_food->typical_food->name }}">
                                                    <div class="card-body text-center d-flex flex-column justify-content-center">
                                                        <h5 class="card-title">{{ $typical_food->typical_food->name }}</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @php $firstImageFood = false; @endphp
                                @endforeach
                            </div>
                            <a class="carousel-control-prev w-aut" href="#recipeCarouselNext" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next w-aut" href="#recipeCarouselNext" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <p class="h2">Localização</p>
                <div>
                    <p>{{ $event->address }}, {{ $event->district }}</p>
                    {!! $event->renderMap($event->latitude, $event->longitude) !!}
                </div>
                @if(count($event->city->tourist_spots)>0)
                    <p class="h2">Pontos Turisticos</p>
                    <div class="container text-center">
                        <div class="row mx-auto my-auto justify-content-center">
                            <div id="recipeCarouselSpots" class="carousel carouselCalendario slide" data-bs-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    @php $firstSpot = true; @endphp
                                    @foreach( $event->city->tourist_spots as $tourist_spot)
                                        <div class="carousel-item  {{ $firstSpot ? 'active' : '' }}">
                                            <div class="w-100 px-3 px-md-0">
                                                <a class="my-3 m-md-0" href="{{ route('web.touristspot.show', $tourist_spot->id) }}">
                                                    <div class="card h-100">
                                                        <img class="card-img-top w-100 h-auto" src="{{ asset('files/' . $tourist_spot->firstImage->image->address) }}"
                                                             alt="{{ $tourist_spot->name }}">
                                                        <div class="card-body text-center d-flex flex-column justify-content-center">
                                                            <h5 class="card-title">{{ $tourist_spot->name }}</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @php $firstSpot = false; @endphp
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev w-aut" href="#recipeCarouselSpots" role="button" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </a>
                                <a class="carousel-control-next w-aut" href="#recipeCarouselSpots" role="button" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                @if(count($event->city->partners)>0)
                    <p class="h2">Parceiros</p>
                    <div class="container text-center">
                        <div class="row mx-auto my-auto justify-content-center">
                            <div id="recipeCarouselPartners" class="carousel carouselThird slide" data-bs-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    @php $firstPartner = true; @endphp
                                    @foreach( $event->city->partners as $partner)
                                        <div class="carousel-item  {{ $firstPartner ? 'active' : '' }}">
                                            <div class="w-100 px-3 px-md-0">
                                                <a class="my-3 m-md-0" href="{{ route('web.touristspot.show', $partner->id) }}">
                                                    <div class="card h-100">
                                                        <img class="card-img-top w-100 h-auto" src="{{ asset('files/' . $partner->firstImage->image->address) }}"
                                                             alt="{{ $partner->name }}">
                                                        <div class="card-body text-center d-flex flex-column justify-content-center">
                                                            <h5 class="card-title">{{ $partner->name }}</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @php $firstPartner = false; @endphp
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev w-aut" href="#recipeCarouselSpots" role="button" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </a>
                                <a class="carousel-control-next w-aut" href="#recipeCarouselSpots" role="button" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
@stop
@section('post_content')
    <div id="contato" class="container-fluid" style="background: var(--ci-color-green)">
        <div class="container py-5">
            <div class="row mt-4">
                <div class="col-6">
                    <img src="/assets/img/atema-logo.png" class="img-fluid w-25">
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
