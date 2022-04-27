@extends('adminlte::page')
@section('title', 'Parceiro - Listagem')

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
                <h1>Parceiro
                    <small>Listar</small>
                    <a href="{{ route('partner.create') }}" class="btn btn-info" title="Adicionar novo registro">
                        <i class="far fa-plus-square"></i>
                    </a>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active">Parceiro</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table id="grid-data" class="table table-condensed table-hover table-striped">
                    <!--<thead>
                     <tr>
                        <th>ID</th>
                        <th>Nome</th>
                         <th>Tipo</th>
                         <th>Email</th>
                         <th>Site</th>
                         <th>Telephone</th>
                         <th>Endereço</th>
                         <th>Distrito</th>
                        <th></th>
                        </tr>
                    </thead>-->
                    <thead>
                    <tr>
                        <th data-column-id="id" >Código</th>
                        <th data-column-id="name" data-order="desc" data-sortable="true">Nome</th>
                        <th data-column-id="district" data-sortable="true">Localidade</th>
                        <th data-column-id="email" data-sortable="true">Email</th>
                        <th data-column-id="site" data-sortable="true">Site</th>
                        <th data-column-id="telephone" data-sortable="true">Telefone</th>
                        <th data-column-id="address" data-sortable="true">Endereço</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
                    </tr>
                    </thead>

                   <!--<tbody>
                   @foreach($partners as $partner)
                        <tr>
                            <td>{{ $partner->id }}</td>
                            <td>{{ $partner->name }}</td>
                            <td>{{ $partner->partner_type->name }}</td>
                            <td>{{ $partner->email }}</td>
                            <td>{{ $partner->site }}</td>
                            <td>{{ $partner->telephone }}</td>
                            <td>{{ $partner->address}}</td>
                            <td>{{ $partner->district }}</td>
                            <td>
                                <a href="{{ route('partner.edit', ['partner' =>$partner->id]) }}" class="btn btn-primary">Editar</a>
                                 <a href="{{ route('partner.show', ['partner' =>$partner->id]) }}" class="btn btn-info">Ver</a>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>-->
                    </table>
                </div>
        </div>
    </div>
@endsection

