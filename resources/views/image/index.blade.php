@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Listagem de Imagens</h1>
                <a href="{{ route('image.create') }}" class="btn btn-info">Nova Imagem</a>
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>endereço</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($image as $image)
                        <tr>
                            <td>{{ $image->id }}</td>
                            <td>{{ $image->address }}</td>

                            <td>
                                <a href="{{ route('image.edit', $image->id) }}" class="btn btn-primary">Editar</a>
                                <a href="{{ route('image.show', $image->id) }}" class="btn btn-info">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
