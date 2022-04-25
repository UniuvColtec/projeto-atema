@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Listagem de Usuários</h1>
                <a href="{{ route('user.create') }}" class="btn btn-info">Novo Usuário</a>
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Cidade</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->city->name }}</td>

                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
