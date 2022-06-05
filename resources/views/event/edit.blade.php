@extends('adminlte::page')
@section('title', 'Eventos - Alterar')

@push('css')
@endpush

@push('js')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src=" {{ asset('js/bs-stepper.js') }}" type="text/javascript"></script>
    <script src="/js/formAjaxAlterar.js" type="text/javascript"></script>
    <script>
        var stepper;
        $(document).ready(function(){
            var stepperEl = document.getElementById("stepper");
            stepper = new Stepper(stepperEl, {
                linear: false
            });

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
            $('#description').summernote({
                placeholder: 'Preencha a descrição do evento',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        })


    </script>
@endpush

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Eventos
                    <small>Alterar</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('event.index') }}"> Eventos</a></li>
                    <li class="breadcrumb-item active">Alterar</li>
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
                    <form role="form" action="{{ route('event.update', $event->id) }}" method="post" class="jsonForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div id="stepper" class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                                <!-- your steps here -->
                                <div class="step" data-target="#information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Informações</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#localization-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="localization-part" id="localization-part-trigger">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Localização</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#other-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="other-part" id="other-part-trigger">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Outros</span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#image-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="image-part" id="image-part-trigger">
                                        <span class="bs-stepper-circle">4</span>
                                        <span class="bs-stepper-label">Imagens</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <!-- your steps content here -->
                                <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Nome:</label>
                                            <input name="name" id="name" class="form-control" placeholder="Nome" value="{{ $event->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact">Contato:</label>
                                            <input type="text" name="contact" id="contact" class="form-control" placeholder="Contato" value="{{ $event->contact }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Descrição:</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="Descrição" required>{{ $event->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">Data de início:</label>
                                            <input type="datetime-local" name="start_date" id="start_date" class="form-control" placeholder="Data de início" value="{{ $event->start_date->format('Y-m-d\TH:i:s') }}" required  min="{{ $event->created_at->format('Y-m-d\TH:i:s') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="final_date">Data de encerramento:</label>
                                            <input type="datetime-local" name="final_date" id="final_date" class="form-control" placeholder="Data de encerramento" value="{{ $event->final_date->format('Y-m-d\TH:i:s') }}" required min="{{ $event->created_at->format('Y-m-d\TH:i:s') }}">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Próximo</button>
                                        <button type="submit" class="btn btn-success">Salvar</button>
                                    </div>
                                </div>
                                <div id="localization-part" class="content" role="tabpanel" aria-labelledby="localization-part-trigger">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="cities">Cidade</label>
                                            <select name="cities" id="cities" class="form-control select" required>
                                                <option value="">- Selecione uma Cidade -</option>
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}" @if($event->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Endereço:</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Endereço" value="{{ $event->address }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="district">Bairro:</label>
                                            <input type="text" name="district" id="district" class="form-control" placeholder="Bairro" value="{{ $event->district }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="localization">Localização:</label>
                                            <input type="text" name="localization" id="localization" class="form-control" placeholder="Localização">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-info" onclick="stepper.previous()">Anterior</button>
                                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Próximo</button>
                                        <button type="submit" class="btn btn-success">Salvar</button>
                                    </div>
                                </div>

                                <div id="other-part" class="content" role="tabpanel" aria-labelledby="other-part-trigger">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="typical_foods">Comidas Típicas</label>
                                            <select name="typical_foods[]" id="typical_foods" class="form-control select2" multiple required data-placeholder="Selecione uma ou mais comidas típicas" >
                                                @foreach($typical_foods as $typical_food)
                                                    @php
                                                        $selected = ''
                                                    @endphp
                                                    @foreach($event->event_typical_food as $event_typical_food)
                                                        @if($event_typical_food->typical_food_id == $typical_food->id)
                                                            @php
                                                                $selected = 'selected'
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <option value="{{$typical_food->id}}" {{ $selected }}>{{$typical_food->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="categories">Categorias</label>
                                            <select name="categories[]" id="categories" class="form-control select2 " multiple required data-placeholder="Selecione uma ou mais categorias" >
                                                @foreach($categories as $category)
                                                    @php
                                                        $selected = ''
                                                    @endphp
                                                    @foreach($event->event_category as $event_category)
                                                        @if($event_category->category_id == $category->id)
                                                            @php
                                                                $selected = 'selected'
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <option value="{{$category->id}}" {{ $selected }}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-info" onclick="stepper.previous()">Anterior</button>
                                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Próximo</button>
                                        <button type="submit" class="btn btn-success">Salvar</button>
                                    </div>
                                </div>
                                <div id="image-part" class="content" role="tabpanel" aria-labelledby="image-part-trigger">
                                    <div class="card-body">

                                        @include('event.image')

                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-info" onclick="stepper.previous()">Anterior</button>
                                        <button type="submit" class="btn btn-success">Salvar</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
