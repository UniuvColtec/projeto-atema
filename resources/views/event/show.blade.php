@extends('adminlte::page')
@section('title', 'Eventos - Visualizar')

@push('css')
    {{--    <link rel="stylesheet" href="/css/iziToast.min.css">--}}
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
            max-width: 250px;
        }
        .grid-gallery {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-column-gap: 10px;
            /*border: solid dimgray 3px;
            border-radius: 5px;*/
        }

    </style>
@endpush

@push('js')
    <script src=" {{ asset('js/bs-stepper.js') }}" type="text/javascript"></script>
    {{--    <script src="/js/iziToast.min.js" type="text/javascript"></script>--}}
    {{--    <script src="/js/jquery.form.min.js" type="text/javascript"></script>--}}
    <script src="/js/formAjaxCadastrar.js" type="text/javascript"></script>
    <script>
        var stepper;
        $(document).ready(function(){
            var stepperEl = document.getElementById("stepper");
            stepper = new Stepper(stepperEl);
            // // $('#information-part').validate();
            //
            stepperEl.addEventListener('show.bs-stepper', function (event) {
                if (!$('.jsonForm').valid()){
                    event.preventDefault()
                }
            })
            stepperEl.addEventListener('shown.bs-stepper', function(event){
                $(".select2").select2();
            });

            $('.jsonForm').validate({
                errorClass: 'is-invalid',

            });
        })

    </script>
@endpush

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Eventos
                    <small>Visualizar</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('event.index') }}"> Eventos</a></li>
                    <li class="breadcrumb-item active">Visualizar</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">
                      <form role="form" action="{{ route('event.store') }}" method="post" class="jsonForm">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                                    <div class="card-body">
                                        <div class="form-group" style="text-align: center">
                                            <p class="h1">{{ $event->name }}</p>
                                            <p class="h6">{{ $event->subtitle }}</p>
                                            <img src="{{$event->getUrlLogo()}}" alt="{{$event->title}}" class="img-thumbnail" style="max-height: 64px;">
                                        </div>
                                        <div class="form-group">
                                            {!!$event->description!!}
                                            <label>Detalhes:</label>
                                            <p>
                                                O evento ocorrera de {{ $event->show_date }}
                                            </p>
                                                <p>Dentre as comidas tipicas estão:
                                                    @foreach($typical_event_foods as $typical_event_food)
                                                        @if($typical_event_food->event_id == $event->id)
                                                            @foreach($typical_foods as $typical_food)
                                                                @if($typical_event_food->typical_food_id == $typical_food->id)
                                                                    {{ $typical_food->name }},
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <p>As categorias do evento são:
                                                    @foreach($event_categories as $event_category)
                                                        @if($event_category->event_id == $event->id)
                                                            @foreach($categories as $category)
                                                                @if($event_category->category_id == $category->id)
                                                                    {{ $category->name }}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </p>
                                            </div>
                                        <div class="form-group">
                                            {{-- <label for="categories">Categorias:</label>
                                              {{ $event->event_category->category->name }} --}}

                                        </div>
                                        <div class="form-group">
                                            <label for="address">Endereço:</label>
                                            @foreach($cities as $city)
                                                @if($city->id == $event->city_id){{$city->name}},@endif
                                            @endforeach
                                            {{ $event->address }}, {{ $event->district }}
                                        </div>
                                        <div class="form-group">
                                            {!! $event->renderMap($event->latitude, $event->longitude) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Imagem:</label>
                                            <br>
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
                                        <div class="footer">
                                            <div style="display: flex; flex-direction: row; justify-content: space-evenly;">
                                                <div>
                                                    <label class="fa-solid fa-globe"></label>
                                                    {{ $event->website }}
                                                </div>
                                                <div>
                                                    <label class="fa-solid fa-phone"></label>
                                                    {{ $event->contact }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
