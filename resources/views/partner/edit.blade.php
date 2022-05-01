@extends('adminlte::page')
@section('title', 'Parceiro- Alterar')

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
                <h1>Parceiro
                    <small>Alterar</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partner.index') }}">Parceiro</a></li>
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
                    <form role="form" action="{{ route('partner.update', $partner->id) }}" method="POST" class="jsonForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card-body">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name"
                                       name="name" placeholder="nome" >
                            </div>
                            <div class="form-group">
                                <label for="partner_type_id">Tipo:</label>
                                <select name="partner_type_id" id="partner_type_id"
                                        class="form-control">
                                    <option value="">- Selecione um Tipo -</option>
                                    @foreach($partner_type as $partner_type)
                                        <option value="{{$partner_type->id}}" >{{$partner_type->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city_id">Cidade:</label>
                                <select name="city_id" id="city_id"
                                        class="form-control">
                                    <option value="">- Selecione uma Cidade -</option>
                                    @foreach($partner_cities as $partner_city)
                                        <option value="{{$city->id}}" >{{$city->name}}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email"
                                       name="email" placeholder="Email" >
                            </div>
                            <div class="form-group">
                                <label for="site">Site:</label>
                                <input type="text" class="form-control" id="site" name="site" placeholder="www.meusite.com.br">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone:</label>
                                <input type="text" class="form-control" id="telephone"
                                       name="telephone" placeholder="5555-5555" >
                            </div>
                            <div class="form-group">
                                <label for="address">Endereço:</label>
                                <input type="text" class="form-control" id="address"
                                       name="address" placeholder="Rua exemplo 1111" >
                            </div>
                            <div class="form-group">
                                <label for="district">Distrito:</label>
                                <input type="text" class="form-control" id="district"
                                       name="district" placeholder="" >
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude:</label>
                                <input type="text" class="form-control" id="latitude"
                                       name="latitude" placeholder="latitude" >
                            </div>
                            <div class="form-group">
                                <label for="longitude">Longitude:</label>
                                <input type="text" class="form-control" id="longitude"
                                       name="longitude" placeholder="longitude">
                            </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
@endsection

