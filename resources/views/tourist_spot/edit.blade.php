@extends('adminlte::page')
@section('title', 'Pontos Turísticos- Alterar')

@push('css')
    <link rel="stylesheet" href="/css/iziToast.min.css">
@endpush

@push('js')
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script src="/js/formAjaxAlterar.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".select2").select2();
        })
        $('#description').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pontos Turísticos
                    <small>Alterar</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tourist_spot.index') }}">Pontos Turísticos</a></li>
                    <li class="breadcrumb-item active">Alterar</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <form role="form" action="{{ route('tourist_spot.update', $tourist_spot->id) }}" method="post" class="jsonForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div>
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="nome" value="{{ $tourist_spot->name}}" >
                            </div>

                            <div class="form-group">
                                <label for="description">Descrição:</label>
                                <textarea id="description" name="description" required  >{{ $tourist_spot->description }}</textarea>
                            </div>
                            <div class="card-body">
                                    <div class="form-group jsonForm">
                                        <h4>Endereço:</h4>
                                        <div>
                                            <label for="cities">Cidade:</label>
                                            <select name="cities" id="cities"
                                                    class="form-control">
                                                <option >- Selecione uma Cidade -</option>
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}" >{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div >
                                            <label for="address">Endereço:</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Rua exemplo 1111" value="{{ $tourist_spot->address}}">
                                        </div>
                                        <div >
                                            <label for="district">Localidade:</label>
                                            <input type="text" class="form-control" id="district" name="district" placeholder="" value="{{ $tourist_spot->district}}">
                                        </div>
                                    </div>



                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>

@endsection

