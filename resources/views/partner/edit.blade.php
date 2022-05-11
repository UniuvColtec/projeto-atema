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
                    <form role="form" action="{{ route('partner.update', $partner->id) }}" method="post" class="jsonForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="form-group">
                                 <label for="name">Nome:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="nome" value="{{ $partner->name}}">
                                </div>
                            <div>
                                <label for="partner_type_id">Tipo:</label>
                                <select name="partner_type_id" id="partner_type_id" class="form-control" >
                                    <option value="">- Selecione um Tipo -</option>
                                    @foreach($partner_type as $partner_type)
                                        <option value="{{$partner_type->id}}" @if($partner->type_id == $partner_type->id) selected @endif>{{$partner_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="cities">Cidade:</label>
                                <select name="cities" id="cities" class="form-control">
                                    <option value="">- Selecione uma Cidade -</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $partner->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="site">Site:</label>
                                    <input type="text" class="form-control" id="site" name="site" placeholder="www.meusite.com.br" value="{{ $partner->site}}">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Telephone:</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="5555-5555"  value="{{ $partner->telephone}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Endereço:</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Rua exemplo 1111" value="{{ $partner->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="district">Localidade:</label>
                                    <input type="text" class="form-control" id="district" name="district" placeholder="" value="{{ $partner->district}}">
                                </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                    </form>
@endsection

