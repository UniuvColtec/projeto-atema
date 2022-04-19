@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1>Tipo parceiro - Editar </h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form role="form" action="{{ route('typical_food.update', $typical_food->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ old('name',$typical_food->name) }}">
                                </div>
                            <div class="form-group">
                                <label for="descripition">Descrição:</label>
                                <input type="text" class="form-control" id="descripition" name="descripition" placeholder="Decrição" value="{{ old('description',$typical_food->decription) }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Imagem:</label>
                                <input type="text" class="form-control" id="image" name="image" placeholder="Imagem" value="{{ old('image',$typical_food->image) }}">
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

