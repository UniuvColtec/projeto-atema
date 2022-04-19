@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Listagem de comida tipica</h1>
                <a href="{{ route('typical_food.create') }}" class="btn btn-info">Nova tipo de comida tipica</a>
                <table class="table table-responsive table-striped">
                    <thead>
                     <tr>
                        <th>ID</th>
                        <th>Nome</th>
                         <th>Descrição</th>
                         <th>Image</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($typical_food as $typical_food)
                        <tr>
                            <td>{{ $typical_food->id }}</td>
                            <td>{{ $typical_food->name }}</td>
                            <td>{{ $typical_food->description }}</td>
                            <td>{{ $typical_food->image }}</td>
                            <td>
                                <a href="{{ route('typical_food.edit', ['typical_food' =>$typical_food->id]) }}" class="btn btn-primary">Editar</a>
                                 <a href="{{ route('typical_food.show', ['typical_food' =>$typical_food->id]) }}" class="btn btn-info">Ver</a>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection

