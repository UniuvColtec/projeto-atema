@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Listagem de Categorias</h1>
                <a href="{{ route('category.create') }}" class="btn btn-info">Nova Categoria</a>
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>

                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Editar</a>
                                <a href="{{ route('category.show', $category->id) }}" class="btn btn-info">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
