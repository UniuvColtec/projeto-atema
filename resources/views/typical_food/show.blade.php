@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1>comida tipica - Exibir</h1>
                    <div class="card-body">
                        <form action="{{ route('typical_food.destroy', ['typical_food' =>$typical_food->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('typical_food.index') }}" class="btnbtn-primary">Listar</a>
                            <a href="{{ route('typical_food.edit', ['typical_food' =>$typical_food->id]) }}" class="btn btn-success">Editar</a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?');">Excluir</button> </form>
                        <div class="form-group">
                            <label for="nome">ID: </label>
                            {{ $typical_food->id }}
                            </div>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            {{ $typical_food->name }}
                            </div>
                        <div class="form-group">
                            <label for="description">Descrição:</label>
                            {{ $typical_food->description }}
                        </div>
                        <div class="form-group">
                            <label for="image">imagem:</label>
                            {{ $typical_food->image}}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
