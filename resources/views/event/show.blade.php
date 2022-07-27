@extends('adminlte::page')
@section('title', 'Eventos - Visualizar')

@push('css')
    {{--    <link rel="stylesheet" href="/css/iziToast.min.css">--}}
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
                    <form role="form" action="{{ route('event.store') }}" method="post" class="jsonForm">
                        {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Nome:</label>
                                            {{ $event->name }}
                                        </div>
                                        <div class="form-group">
                                            <label for="contact">Contato:</label>
                                            {{ $event->contact }}
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Descrição:</label>


                                            {!!$event->description!!}
                                        </div>
                                        <div class="form-group">
                                            <label for="categories">Categorias:</label>
                                            {{-- {{ $event->event_category->category }} --}}
                                            @foreach($event_categories as $event_category)
                                                @if($event_category->event_id == $event->id)
                                                    @foreach($categories as $category)
                                                        @if($event_category->category_id == $category->id)
                                                            {{ $category->name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="typical_foods">Comidas Típicas:</label>
                                            @foreach($typical_event_foods as $typical_event_food)
                                                @if($typical_event_food->event_id == $event->id)
                                                    @foreach($typical_foods as $typical_food)
                                                        @if($typical_event_food->typical_food_id == $typical_food->id)
                                                            {{ $typical_food->name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">Data:</label>
                                            {{ $event->show_date }}
                                        </div>
                                        <div class="form-group">
                                            <label for="cities">Cidade</label>
                                            @foreach($cities as $city)
                                                @if($city->id == $event->city_id){{$city->name}}@endif
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Endereço:</label>
                                            {{ $event->address }}
                                        </div>
                                        <div class="form-group">
                                            <label for="district">Bairro:</label>
                                            {{ $event->district }}
                                        </div>

                                        <div class="form-group">
                                            <label for="localization">Localização:</label>
                                            <br>
                                            {!! $event->renderMap($event->latitude, $event->longitude) !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="logo">Logo:</label>
                                            <br>
                                            <img src="{{$event->getUrlLogo()}}" alt="{{$event->title}}" class="img-thumbnail" style="max-width: 266px; max-height: 266px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Imagem:</label>
                                            @foreach($event->images as $image)
                                                <img class="card-img-top w-100 h-auto" src="{{ asset('files/' . $event->firstImage->image->address) }}"
                                                     alt="{{ $event->name }}" style="max-width: 500px; max-height: 400px;">
                                            @endforeach
                                        </div>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
