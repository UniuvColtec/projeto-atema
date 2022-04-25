@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1>Usuário - Exibir</h1>
                    <div class="card-body">
                        <form action="{{ route('user.destroy', ['user' =>$user->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('user.index') }}" class="btn btn-primary">Listar</a>
                            <a href="{{ route('user.edit', ['user' =>$user->id]) }}" class="btn btn-success">Editar</a>
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Deseja realmente excluir?');">Excluir</button> </form>
                        <div class="form-group">
                            <label for="name">ID: </label>
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
