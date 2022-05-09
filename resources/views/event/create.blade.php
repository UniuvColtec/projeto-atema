@extends('adminlte::page')
@section('title', 'Eventos - Cadastro')

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
                <h1>Eventos
                    <small>Cadastro</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('event.index') }}"> Eventos</a></li>
                    <li class="breadcrumb-item active">Cadastro</li>
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
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="name" placeholder="Nome" required>
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text" id="descricao" name="description" class="form-control" placeholder="Descrição" required>
                            </div>
                            <div class="form-group">
                                <label for="contato">Contato</label>
                                <input type="text" id="contato" name="contact" class="form-control" placeholder="Contato" required>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Data de Inicio</label>
                                <input type="datetime-local" id="start_date" name="start_date" class="form-control" placeholder="Data de inicio" required>
                            </div>
                            <div class="form-group">
                                <label for="final_date">Data de Fim</label>
                                <input type="datetime-local" id="final_date" name="final_date" class="form-control" placeholder="Data de Fim" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Endereço</label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="Endereço" required>
                            </div>
                            <div class="form-group">
                                <label for="district">Distrito</label>
                                <input type="text" id="district" name="district" class="form-control" placeholder="Distrito" required>
                            </div>
                            <div class="form-group">
                                <label for="link">Localização</label>
                                <input type="text" id="link" name="link" class="form-control" placeholder="Coloque a url do local" required>
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
