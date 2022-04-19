@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1>Categoria - Exibir</h1>
                    <div class="card-body">
                        <form action="{{ route('category.destroy', ['category' =>$category->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('category.index') }}" class="btn btn-primary">Listar</a>
                            <a href="{{ route('category.edit', ['category' =>$category->id]) }}" class="btn btn-success">Editar</a>
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Deseja realmente excluir?');">Excluir</button> </form>
                        <div class="form-group">
                            <label for="name">ID: </label>
                            {{ $category->id }}
                        </div>
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            {{ $category->name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
