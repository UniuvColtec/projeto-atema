@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1>Cidade - Editar</h1>
                    @if ($errors->any())
                        <div class="aler alert-danger">
                            <ul>
                                @foreach ($errrors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" action="{{ route('city.update', $city->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="name" placeholder="Nome" value="{{ old('name', $city->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select class="form-control" id="estado" name="state">
                                    <option value="">Selecione um estado</option>                                    
                                    <option value='pr'>Paraná</option>
                                    <option value='sc'>Santa Catarina</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
@endsection