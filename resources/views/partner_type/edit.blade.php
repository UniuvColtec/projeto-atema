@extends('adminlte::page')
@section('title', 'tipo de parceiro - Alterar')

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
                <h1>tipo de parceiro
                    <small>Alterar</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partner_type.index') }}"> tipo de parceiro</a></li>
                    <li class="breadcrumb-item active">Alterar</li>
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
                    <h1>Tipo parceiro - Alterar </h1>
                    <form role="form" action="{{ route('partner_type.update', $partner_type->id)}}" method="post" class="jsonForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nome do tipo:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ old('name',$partner_type->name) }}">
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

