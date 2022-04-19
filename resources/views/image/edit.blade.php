@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1>Imagem- Editar </h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" action="{{ route('image.update', $image->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="card-body">
                            <div class="form-group">
                                <label for="address">Endereço</label>
                                <input type="text" class="form-control" id="address"
                                       name="address" placeholder="Address" value="{{ old('address',$image->address) }}">
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
