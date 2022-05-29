@extends('adminlte::page')
@section('title', 'Partner - Exibir')

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
                <h1>Parceiro
                    <small>Exibir</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partner.index') }}"> Parceiro</a></li>
                    <li class="breadcrumb-item active">Exibir</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1> parceiro - Exibir</h1>
                    <div class="card-body">
                        <form action="{{ route('partner.destroy', ['partner' =>$partner->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <div class="form-group">
                            <label for="nome">ID: </label>
                            {{ $partner->id }}
                            </div>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            {{ $partner->name }}
                            </div>
                        <div class="form-group">
                            <label for="cities">Cidade:</label>
                            {{ $partner->city->name }}
                        </div>
                        <div class="form-group">
                            <label for="partner_type_id">Tipo:</label>
                            {{ $partner->partner_type->name }}
                        </div>
                            <div class="form-group">
                                <label for="cnpj">Cnpj:</label>
                                {{ $partner->cnpj }}
                            </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            {{ $partner->email }}
                        </div>
                        <div class="form-group">
                            <label for="site">Site:</label>
                            {{ $partner->site }}
                        </div>
                        <div class="form-group">
                            <label for="telephone">Telefone:</label>
                            {{ $partner->telephone}}
                        </div>
                        <div class="form-group">
                            <label for="address">Endereço:</label>
                            {{ $partner->address }}
                        </div>
                        <div class="form-group">
                            <label for="district">Distrito:</label>
                            {{ $partner->district }}
                        </div>
                            <div class="form-group">
                                <label for="description">Descrição:</label>
                                {!!$partner->description!!}
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
