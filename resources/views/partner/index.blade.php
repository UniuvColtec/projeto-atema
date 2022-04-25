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
                         <th>Tipo</th>
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
                    @foreach($partners as $partner)
                        <tr>
                            <td>{{ $partner->id }}</td>
                            <td>{{ $partner->name }}</td>
                            <td>{{ $partner->partner_type->name }}</td>
                            <td>{{ $partner->email }}</td>
                            <td>{{ $partner->site }}</td>
                            <td>{{ $partner->telephone }}</td>
                            <td>{{ $partner->address}}</td>
                            <td>{{ $partner->district }}</td>
                            <td>{{ $partner->latitude}}</td>
                            <td>{{ $partner_->longitude}}</td>
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

