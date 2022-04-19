@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1>Cidade - Listagem</h1>
                    <a href="{{ route('city.create') }}" class="btn btn-info">
                        Nova Cidade
                    </a>
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($city as $city)
                                <tr>
                                    <td>
                                        {{ $city->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ $city->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $city->state }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ route('city.edit',['city' => $city->id]) }}" class="btn btn-primary">
                                            Editar
                                        </a>
                                        <a href="{{ route('city.show',['city' => $city->id]) }}" class="btn btn-info">
                                            Ver
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
