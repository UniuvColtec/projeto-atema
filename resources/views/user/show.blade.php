@extends('adminlte::page')
@section('title', 'Usuário - Exibir')

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
                <h1>Usuário
                    <small>Exibir</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}"> Usuário</a></li>
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
                        <div class="card-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="id">ID: </label>
                            {{ $user->id }}
                        </div>

                        <div class="form-group">
                            <label for="name">Nome:</label>
                            {{ $user->name }}
                        </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                {{ $user->email }}
                            </div>

                            <div class="form-group">
                                <label for="city_id">Cidade:</label>
                                {{ $user->city_id }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
