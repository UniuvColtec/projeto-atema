@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1>Tipo de parceiro - Exibir</h1>
                    <div class="card-body">
                        <form action="{{ route('partner_type.destroy', ['partner_type' =>$partner_type->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('partner_type.index') }}" class="btnbtn-primary">Listar</a>
                            <a href="{{ route('partner_type.edit', ['partner_type' =>$partner_type->id]) }}" class="btn btn-success">Editar</a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?');">Excluir</button> </form>
                        <div class="form-group">
                            <label for="nome">ID: </label>
                            {{ $partner_type->id }}
                            </div>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            {{ $partner_type->name }}
                            </div>
                        <div class="form-group">
                            <label for="type">Tipo:</label>
                            {{ $partner_type->type }}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
