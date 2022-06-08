@extends('adminlte::page')
@section('title', 'Usuário - Editar Senha')

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









