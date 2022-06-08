@extends('adminlte::page')
@section('title', 'Usuário - Editar Dados')

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
                    <form role="form" action="{{ route('profile.save') }}" method="POST" class="jsonForm">

                        {{ csrf_field() }}

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label for="city_id">Cidade</label>
                                <select name="city_id" id="city_id"
                                        class="form-control">
                                    <option value="">- Selecione uma Cidade -</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{ $city->id== old('city_id', $user->city_id) ?'selected' : '' }} >{{$city->name}}</option>

                                    @endforeach
                                </select>
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









