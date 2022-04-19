@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
             <div class="col-12">
                <div class="card card-primary">
                    <h1>comida tipica - Cadastro</h1>
                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form role="form" action="{{ route('typical_food.store') }}"
                             method="post">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name"
                                          name="name" placeholder="nome" value="{{ old('name') }}">
                                </div>
                            <div class="form-group">
                                <label for="description">Descrição:</label>
                                <input type="text" class="form-control" id="description"
                                       name="description" placeholder="description" value="{{ old('description') }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Imagem:</label>
                                <input type="text" class="form-control" id="image"
                                       name="image" placeholder="image" value="{{ old('image') }}">
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
