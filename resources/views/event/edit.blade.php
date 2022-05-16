@extends('adminlte::page')
@section('title', 'Comida Típica - Alterar')

@push('css')
    <link rel="stylesheet" href="/css/iziToast.min.css">
@endpush

@push('js')
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script src="/js/formAjaxAlterar.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $(".select2").select2();
        })
    </script>
@endpush

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Comida Típica
                    <small>Alterar</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('typical_food.index') }}"> Comidas Típicas</a></li>
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
                    <form role="form" action="{{ route('typical_food.update', $typical_food->id) }}" method="POST" class="jsonForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
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
                                <div class="line"></div>
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
                                            <input name="name" id="name" class="form-control" placeholder="Nome" value="{{ $event->name }}">
                                        </div>
                                        <div class="form-group">    
                                            <label for="contact">Contato:</label>
                                            <input type="text" name="contact" id="contact" class="form-control" placeholder="Contato" value="{{ $event->contact}}">
                                        </div>
                                        <div class="form-group">    
                                            <label for="description">Descrição:</label>
                                            <input type="text" name="description" id="description" class="form-control" placeholder="Descrição" value="{{ $event->descritpion}}">
                                        </div>
                                        <div class="form-group">    
                                            <label for="start_date">Data de inicio:</label>
                                            <input type="datetime-loal" name="start_date" id="start_date" class="form-control" placeholder="Data de inicio" value="{{ $event->start_date }}">
                                        </div>
                                        <div class="form-group">    
                                            <label for="final_date">Data de encerramento:</label>
                                            <input type="datetime-local" name="final_date" id="final_date" class="form-control" placeholder="Data de encerramento" value="{{ $event->final_date }}">
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
                                                    <option value="{{$city->id}}" @if($event->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">    
                                            <label for="address">Endereço:</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Endereço" value="{{ $event->address }}">
                                        </div>
                                        <div class="form-group">    
                                            <label for="district">Bairro:</label>
                                            <input type="text" name="district" id="district" class="form-control" placeholder="Bairro" value="{{ $event->district }}">
                                        </div>    
                                        <div class="form-group">    
                                            <label for="localization">Localização:</label>
                                            <input type="text" name="localization" id="localization" class="form-control" placeholder="Localização">
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
                                            <input type="text" name="image" id="image" class="form-control" placeholder="Imagem">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="typical_foods">Comidas Típicas</label>
                                        <select name="typical_foods" id="typical_foods" class="form-control select2" >
                                            <option value="">- Selecione uma Comida Típica -</option>
                                            @foreach($typical_foods as $typical_food)
                                                <option value="{{$typical_food->id}}">{{$typical_food->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="categories">Categorias</label>
                                        <select name="categories" id="categories" class="form-control select2" >
                                            <option value="">- Selecione uma Categorias -</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
