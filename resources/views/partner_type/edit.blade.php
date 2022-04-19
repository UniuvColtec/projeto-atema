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
                    <form role="form" action="{{ route('partner_type.update', $partner_type->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ old('name',$partner_type->name) }}">
                                </div>
                            <div class="form-group">
                                <label for="type">Tipo:</label>
                                <input type="text" class="form-control" id="type" name="type" placeholder="Tipo" value="{{ old('type',$partner_type->type) }}">
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

