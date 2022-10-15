@extends('adminlte::page')
@section('title', 'Usuário - Alterar Senha')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                <h1>Usuário
                    <small>Alterar Senha</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}"> Usuários</a></li>
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
                    <form role="form" action="{{ route('password.save') }}" method="POST" class="jsonForm">

                        {{ csrf_field() }}


                        <div class="card-body">

                            <div class="form-group">
                                <label for="currentpassword">Senha Atual:</label>
                                <input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="Senha Atual" >
                            </div>

                            <div class="form-group">
                                <label for="password">Nova Senha:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                            </div>

                            <div class="form-group">
                                <label for="confirmpassword">Confirmar Senha:</label>
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirmar Senha">
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









