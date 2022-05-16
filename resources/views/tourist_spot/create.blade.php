@extends('adminlte::page')
@section('title', 'Pontos Turisticos - Cadastro')

@push('css')
    <link rel="stylesheet" href="/css/iziToast.min.css">
@endpush

@push('js')

    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script src="/js/formAjaxCadastrar.js" type="text/javascript"></script>
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
                <h1>Pontos Turisticos
                    <small>Cadastro</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tourist_spot.index') }}"> Pontos Turisticos</a></li>
                    <li class="breadcrumb-item active">Cadastro</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form role="form" action="{{ route('tourist_spot.store') }}" class="jsonForm" method="post">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name"
                                          name="name" placeholder="nome" required >
                                </div>
                            <div class="form-group">
                                <label for="">Descrição:</label>
                                <input type="description" class="form-control " id="description"
                                       name="description" placeholder="Descrição" >
                            </div>
                            <div class="card-body">
                                <div class="form-group jsonForm">
                                    <h4>Endereço:</h4>
                                    <label for="cities">Cidade:</label>
                                    <select name="cities" id="cities" class="form-control ">
                                        <option value="">- Selecione uma Cidade -</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">RUA:</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Rua exemplo 1111" >
                                </div>
                                <div class="form-group">
                                    <label for="district">Bairro:</label>
                                    <input type="text" class="form-control" id="district" name="district" placeholder="" >
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
    </form>
        </div>
@endsection
