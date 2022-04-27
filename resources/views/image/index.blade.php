@extends('adminlte::page')
@section('title', 'Imagem - Listagem')

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
                <h1>Imagem
                    <small>Listar</small>
                    <a href="{{ route('image.create') }}" class="btn btn-info" title="Adicionar novo registro">
                        <i class="far fa-plus-square"></i>
                    </a>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active">Imagem</li>
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
                    <th data-column-id="address" data-order="desc" data-sortable="true">Endereço</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>

@endsection
