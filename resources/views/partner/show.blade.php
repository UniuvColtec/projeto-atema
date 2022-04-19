@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1> parceiro - Exibir</h1>
                    <div class="card-body">
                        <form action="{{ route('partner.destroy', ['partner' =>$partner->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('partner.index') }}" class="btnbtn-primary">Listar</a>
                            <a href="{{ route('partner.edit', ['partner' =>$partner->id]) }}" class="btn btn-success">Editar</a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?');">Excluir</button> </form>
                        <div class="form-group">
                            <label for="nome">ID: </label>
                            {{ $partner->id }}
                            </div>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            {{ $partner->name }}
                            </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            {{ $partner->email }}
                        </div>
                        <div class="form-group">
                            <label for="site">Site:</label>
                            {{ $partner->site }}
                        </div>
                        <div class="form-group">
                            <label for="telephone">Telefone:</label>
                            {{ $partner->telephone}}
                        </div>
                        <div class="form-group">
                            <label for="address">Endereço:</label>
                            {{ $partner->address }}
                        </div>
                        <div class="form-group">
                            <label for="district">Distrito:</label>
                            {{ $partner->district }}
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude:</label>
                            {{ $partner->latitude }}
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude:</label>
                            {{ $partner->longitude }}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
