@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
             <div class="col-12">
                <div class="card card-primary">
                    <h1>parceiro - Cadastro</h1>
                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form role="form" action="{{ route('partner.store') }}"
                             method="post">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name"
                                          name="name" placeholder="nome" value="{{ old('name') }}">
                                </div>
                            <div class="form-group">
                                <label for="partner_type_id">TIPO:</label>
                                <select name="partner_type_id" id="partner_type_id"
                                        class="form-control">
                                    <option value="">- Selecione um tipo-</option>
                                    @foreach($partner_types as $partner_type)
                                        <option value="{{$partner_type->id}}">{{$partner_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email"
                                       name="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="site">Site:</label>
                                <input type="text" class="form-control" id="site"
                                       name="site" placeholder="www.meusite.com.br" value="{{ old('site') }}">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone:</label>
                                <input type="text" class="form-control" id="telephone"
                                       name="telephone" placeholder="5555-5555" value="{{ old('telephone') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Endereço:</label>
                                <input type="text" class="form-control" id="address"
                                       name="address" placeholder="Rua exemplo 1111" value="{{ old('address') }}">
                            </div>
                            <div class="form-group">
                                <label for="district">Distrito:</label>
                                <input type="text" class="form-control" id="district"
                                       name="district" placeholder="" value="{{ old('district') }}">
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude:</label>
                                <input type="text" class="form-control" id="latitude"
                                       name="latitude" placeholder="latitude" value="{{ old('latitude') }}">
                            </div>
                            <div class="form-group">
                                <label for="longitude">Longitude:</label>
                                <input type="text" class="form-control" id="longitude"
                                       name="longitude" placeholder="longitude" value="{{ old('longitude') }}">
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
