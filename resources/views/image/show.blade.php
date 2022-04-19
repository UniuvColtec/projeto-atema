@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1>Imagem - Exibir</h1>
                    <div class="card-body">
                        <form action="{{ route('image.destroy', ['image' =>$image->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('image.index') }}" class="btn btn-primary">Listar</a>
                            <a href="{{ route('image.edit', ['image' =>$image->id]) }}" class="btn btn-success">Editar</a>
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Deseja realmente excluir?');">Excluir</button> </form>
                        <div class="form-group">
                            <label for="name">ID: </label>
                            {{ $image->id }}
                        </div>
                        <div class="form-group">
                            <label for="name">Address:</label>
                            {{ $image->address }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
