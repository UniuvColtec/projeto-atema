@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Listagem de parceiro</h1>
                <a href="{{ route('partner_type.create') }}" class="btn btn-info">Nova tipo de parceiro</a>
                <table class="table table-responsive table-striped">
                    <thead>
                     <tr>
                        <th>ID</th>
                        <th>Nome</th>
                         <th>Tipo</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($partner_type as $partner_type)
                        <tr>
                            <td>{{ $partner_type->id }}</td>
                            <td>{{ $partner_type->name }}</td>
                            <td>{{ $partner_type->type }}</td>
                            <td>
                                <a href="{{ route('partner_type.edit', ['partner_type' =>$partner_type->id]) }}" class="btn btn-primary">Editar</a>
                                 <a href="{{ route('partner_type.show', ['partner_type' =>$partner_type->id]) }}" class="btn btn-info">Ver</a>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection

