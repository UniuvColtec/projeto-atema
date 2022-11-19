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
        window.addpartnerListener("load", function(event) {
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
                <img src="{{ $partner->firstImage ? asset('files/' . $partner->firstImage->image->address) : '/images/none-image.png' }}" class="d-block w-100" alt="{{ $partner->name }}">
                <div class="info-flex">
                    <div class="title-grid">
                        <div>
                            <p class="h4">{{ $partner->name }} </p>
                        </div>
                        <div class='grid-gallery'>
                            <div class="grid-gallery-item">
                                <img src="{{$partner->getUrlLogo()}}" alt="{{ $partner->name }}" class="img-thumbnail mklbItem" style="max-width: 64px; max-height: 64px;" data-gallery='myGallery'>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column flex-lg-row justify-content-between gap-2 gap-md-0 mt-3 mt-lg-0">
                        <div class="d-flex align-items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"  class="bi bi-map-fill color2_svg"
                                 viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z"/>
                            </svg>
                            <span class="badge rounded-pill text color1"  >{{ $partner->city->name .' - '.$partner->city->state}}</span>
                        </div>
                    </div>
                    <div class="types-display">
                        <div class="type-itens">
                            <span class="badge rounded-pill text color1"  >{{$partner->partner_type->name}}</span>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 py-2 mt-3 mt-lg-0">
                        <a href="//{{ $partner->telephone }}" target="_blank" style="margin: 1px">
                            <div class="d-flex align-items-center gap-1 text-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                     class="bi  bi-envelope color2_svg" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                                {{ $partner->telephone }}
                            </div>
                        </a>
                        <a href="//{{ $partner->site }}" target="_blank" style="margin: 1px">
                            <div class="d-flex align-items-center gap-1 text-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                     class="bi bi-globe color2_svg" viewBox="0 0 16 16">
                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                                </svg>
                                Ir para a pagina oficial do evento
                            </div>
                        </a>
                        <a href="//{{ $partner->email }}" target="_blank" style="margin: 1px">
                            <div class="d-flex align-items-center gap-1 text-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                     class="bi  bi-envelope color2_svg" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                                {{ $partner->email }}
                            </div>
                        </a>
                    </div>
                    <div class="text-justify my-4">
                        {!!$partner->description!!}
                    </div>
                </div>
            </div>
            @if(count($partner->images)>0)
                <p class="h2">Galeria de Imagens</p>
                <div class='grid-gallery'>
                    @foreach($partner->images as $image)
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
                <p class="h2">Localização</p>
                <div>
                    <p>{{ $partner->address }}, {{ $partner->district }}</p>
                    {!! $partner->renderMap($partner->latitude, $partner->longitude) !!}
                </div>

                @if(count($partner->city->tourist_spots)>0)
                        <p class="h2">Pontos Turisticos</p>
                        <div class="container text-center">
                            <div class="row mx-auto my-auto justify-content-center">
                                <div id="recipeCarouselSpots" class="carousel carouselCalendario slide" data-bs-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        @php $firstSpot = true; @endphp
                                        @foreach( $partner->city->tourist_spots as $tourist_spot)
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
                                    <a class="carousel-control-prev w-aut color_next_prev" href="#recipeCarouselSpots" role="button" data-bs-slide="prev" >
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </a>
                                    <a class="carousel-control-next w-aut color_next_prev" href="#recipeCarouselSpots" role="button" data-bs-slide="next" >
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
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
                    próximos partneros
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

