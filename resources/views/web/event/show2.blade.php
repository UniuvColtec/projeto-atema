@extends('web.base.page')

@push('css')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        /*Tela Celular*/
        @media screen and (max-width: 999px){
            .banner-n-info-grid {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }
            .gallery {
                width: 100%;
                display: grid;
                grid-template-columns: repeat(2,1fr);
                gap: 2rem;
            }
            .types-display {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }
            .type-itens {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
            }
        }

        /*Tela PC*/
        @media screen and (min-width: 1000px){
            .banner-n-info-grid {
                display: grid;
                grid-template-columns: 2fr 2fr ;
                gap: 4rem;
            }
            .gallery {
                width: 100%;
                display: grid;
                grid-template-columns: repeat(4,1fr);
                gap: 2rem;
            }
            .types-display {
                width: 100%;
                display: grid;
                grid-template-columns: 1fr 2fr;
                gap: 2rem;
            }
            .type-itens {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
        }

        /*Geral*/
        .main-content, .more-info {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .title-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .info-flex {
            display: flex;
            flex-direction: column;
            justify-content: start;
            gap: 1rem;
        }
        .gallery-item {
            transition: 0.5s;
            filter: brightness(100%);
            margin:auto;
        }
        .gallery-item:hover, .gallery-item:focus {
            transition: 1s;
            filter: brightness(60%);
            box-sizing: border-box;
        }
        .type-itens .link:hover, type-itens .link:focus {
            color: #444444;
        }
    </style>


@endpush
@push('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush
@section('content')
    <div class="container my-5">
        <div class="container main-content">
            <div class="banner-n-info-grid">
                <img src="{{ asset('files/' . $event->firstImage->image->address) }}" class="d-block w-100" alt="{{ $event->name }}">
                <div class="info-flex">
                    <div class="title-grid">
                        <div>
                            <p class="h4">{{ $event->name }} </p>
                            <p class="h6">{{ $event->subtitle}}</p>
                        </div>
                        <img src="{{$event->getUrlLogo()}}" alt="{{ $event->name }}" class="img-thumbnail" style="max-width: 64px; max-height: 64px;">
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#FFBB13"
                             class="bi bi-calendar2-week-fill" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zM8.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM3 10.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                        </svg>
                        <span>O evento ocorrerá de {{ $event->show_date}}</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#FFBB13" class="bi bi-map-fill"
                             viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z"/>
                        </svg>
                        <span>{{ $event->city->name . ' - ' . $event->city->state }}</span>
                    </div>
                    <div class="text-justify my-4">
                        {!!$event->description!!}
                    </div>
                </div>
            </div>
            <div class="gallery">
                @foreach($event->images as $image)
                    <div class="gallery-item">
                        <img src="{{ asset('files/' . $image->image->address) }}" class="d-block w-100" alt="">
                    </div>
                @endforeach
            </div>
            <div class="more-info">
                <div class="types-display">
                    <label>Este evento está caracterizado como:</label>
                    <div class="type-itens">
                        @foreach($event->event_category as $category)
                            <span class="badge rounded-pill text" style="background-color: var(--ci-color-green)"> {{ $category->category->name }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="types-display">
                    <label>Dentre suas comidas típicas estão:</label>
                    <div class="type-itens">
                        @foreach($event->event_typical_food as $typical_food)
                            <a href="/comida-tipica/{{ $typical_food->typical_food->id }}" class="badge rounded-pill text link" style="background-color: var(--ci-color-green)"> {{ $typical_food->typical_food->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div>
                    <p for="endereco">Endereço: {{ $event->address }}, {{ $event->district }}</p>

                    {!! $event->renderMap($event->latitude, $event->longitude) !!}
                </div>
            </div>
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
