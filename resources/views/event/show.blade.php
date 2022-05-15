@extends('adminlte::page')
@section('title', 'Eventos - Cadastro')

@push('css')
    <link rel="stylesheet" href="/css/iziToast.min.css">
    <link rel="stylesheet" href="/css/bs-stepper.min.css">
@endpush

@push('js')
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script src="/js/formAjaxCadastrar.js" type="text/javascript"></script>
    <script src="/js/bs-stepper.min.js" type="text/javascript"></script>
    <script src="bs-stepper.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $(".select2").select2();
        })
    </script>
    <script>
        $(document).ready(function () {
            var stepper = new Stepper($('.bs-stepper')[0])
        })
    </script>
@endpush

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Eventos
                    <small>Cadastro</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('event.index') }}"> Eventos</a></li>
                    <li class="breadcrumb-item active">Exibir</li>
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
                            <div class="bs-stepper">
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
                                  <div class="step" data-target="#image-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="image-part" id="image-part-trigger">
                                      <span class="bs-stepper-circle">3</span>
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
                                            {{ $event->id }}
                                        </div>
                                        <div class="form-group">    
                                            <label for="contact">Contato:</label>
                                            {{ $event->contact }}
                                        </div>
                                        <div class="form-group">    
                                            <label for="description">Descrição:</label>
                                            {{ $event->description }}
                                        </div>
                                        <div class="form-group">    
                                            <label for="start_date">Data de inicio:</label>
                                            {{ $event->start_date }}
                                        </div>
                                        <div class="form-group">    
                                            <label for="final_date">Data de encerramento:</label>
                                            {{ $event->final_date }}
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" onclick="stepper.next()">Próximo</button>
                                    </div>
                                </div>
                                <div id="localization-part" class="content" role="tabpanel" aria-labelledby="localization-part-trigger">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="cities">Cidade</label>
                                            <select name="cities" id="cities" class="form-control select2" >
                                                <option value="">- Selecione uma Cidade -</option>
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
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
                                            <iframe src="https://maps.google.com/maps?q={{ $event->longitude }},{{ $event->longitude}} &hl=pt-br&z=17&amp;output=embed"
                                                width="600" 
                                                height="450" 
                                                style="border:0;" 
                                                allowfullscreen="" 
                                                loading="lazy" 
                                                referrerpolicy="no-referrer-when-downgrade">
                                            </iframe>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                                        <button class="btn btn-primary" onclick="stepper.next()">Próximo</button>
                                    </div>
                                </div>
                                <div id="image-part" clas="content" role="tabpanel" aria-labelledby="image-part-trigger">
                                    <div class="card-body">    
                                        <div class="form-group">
                                            <label for="image">Imagem</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="typical_foods">Comidas Típicas</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="categories">Categorias</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
