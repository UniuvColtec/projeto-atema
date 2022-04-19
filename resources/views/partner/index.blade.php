@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Listagem de parceiro</h1>
                <a href="{{ route('partner.create') }}" class="btn btn-info">Novo tipo de parceiro</a>
                <table class="table table-responsive table-striped">
                    <thead>
                     <tr>
                        <th>ID</th>
                        <th>Nome</th>
                         <th>Email</th>
                         <th>Site</th>
                         <th>Telephone</th>
                         <th>Endereço</th>
                         <th>Distrito</th>
                         <th>latitude</th>
                         <th>longitude</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($partner as $partner)
                        <tr>
                            <td>{{ $partner_type->id }}</td>
                            <td>{{ $partner_type->name }}</td>
                            <td>{{ $partner_type->email }}</td>
                            <td>{{ $partner_type->site }}</td>
                            <td>{{ $partner_type->telephone }}</td>
                            <td>{{ $partner_type->address}}</td>
                            <td>{{ $partner_type->district }}</td>
                            <td>{{ $partner_type->latitude}}</td>
                            <td>{{ $partner_type->longitude}}</td>
                            <td>
                                <a href="{{ route('partner.edit', ['partner' =>$partner->id]) }}" class="btn btn-primary">Editar</a>
                                 <a href="{{ route('partner.show', ['partner' =>$partner->id]) }}" class="btn btn-info">Ver</a>
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection

