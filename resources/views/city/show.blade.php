@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1>Cidade - Visualizar</h1>
                    <div class="card-body">
                        <form action="{{ route('city.destroy', ['city' => $city->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('city.index') }}" class="btn btn-primary">Listar</a>
                            <a href="{{ route('city.edit', ['city'=>$city->id]) }}" class="btn btn-success">Editar</a>
                            <button type="submit" class="btn btn-danger" onclick="return comfirm('Deseja realmente excluir?')">Excluir</button>
                            <div class="form-group">
                                <label for="id">ID: </label>
                                {{ $city->id }}
                            </div>
                            <div class="form-group">
                                <label for="nome">Nome: </label>
                                {{ $city->name }}
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado: </label>
                                {{ $city->state }}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection