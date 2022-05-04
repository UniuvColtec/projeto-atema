@extends('adminlte::page')
@section('title', 'Usuário - Listagem')

@push('css')
    <link rel="stylesheet" href="/css/iziToast.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.bootgrid.css"/>
@endpush

@push('js')
    <script src="/js/jquery.bootgrid.js"></script>
    <script src="/js/jquery.bootgrid.fa.js"></script>
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/bootgrid.js"></script>
@endpush

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Usuário
                    <small>Listar</small>
                    <a href="{{ route('user.create') }}" class="btn btn-info" title="Adicionar novo registro">
                        <i class="far fa-plus-square"></i>
                    </a>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active">Usuário</li>
                </ol>
            </div>
        </div>
    </div>
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <table id="grid-data" class="table table-condensed table-hover table-striped">
                <thead>
                <tr>
                    <th data-column-id="id" >Código</th>
                    <th data-column-id="name" data-order="desc" data-sortable="true">Nome</th>
                    <th data-column-id="email" data-sortable="true">Email</th>
                    <th data-column-id="city" data-sortable="true">Cidade</th>
                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>

@endsection

