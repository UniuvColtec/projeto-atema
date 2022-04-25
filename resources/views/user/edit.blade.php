@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1>Usuário - Editar </h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" action="{{ route('user.update', $user->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name"
                                       name="name" placeholder="Nome" value="{{ old('name',$user->name) }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" id="password"
                                       name="password" placeholder="Senha" value="{{ old('password',$user->password) }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Senha</label>
                                <input type="email" class="form-control" id="email"
                                       name="email" placeholder="Email" value="{{ old('email',$user->email) }}">
                            </div>

                            <div class="form-group">
                                <label for="city_id">Cidade</label>
                                <select name="city_id" id="city_id"
                                        class="form-control">
                                    <option value="">- Selecione uma Cidade -</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{ $city->id== old('city_id', $user->city_id) ?'selected' : '' }} >{{$city->name}}</option>

                                    @endforeach
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
