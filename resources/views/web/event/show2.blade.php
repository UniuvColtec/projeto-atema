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
        }
        /*Tela PC*/
        @media screen and (min-width: 1000px){
            .banner-n-info-grid {
                display: grid;
                grid-template-columns: 2fr 2fr ;
                gap: 4rem;
            }
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
        <div class="container">
            <div class="banner-n-info-grid">
                <img src="{{ asset('files/' . $event->firstImage->image->address) }}" class="d-block w-100" alt="">
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
                <div class='grid-gallery'>
                    @foreach($event->images as $image)
                    <div class='grid-gallery-item'>
                        <a href='{{ asset('files/' . $image->image->address) }}' class='btn-download-foto' download>
                            <small>
                                <span class="fa-solid fa-arrow-down-to-line"></span>
                            </small>
                        </a>
                        <br />
                        <img src='{{ asset('files/' . $image->image->address) }}' data-src='/images/noticias/galeria/1620_1.jpg' class='img-responsive mklbItem' data-gallery='myGallery'>
                        <br />
                        </a>
                        </p>
                    </div>
                    @endforeach
            </div>
    </div>
@stop
