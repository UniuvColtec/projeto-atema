@extends('adminlte::page')
@section('title', 'Comidas Típicas - Visualizar')

@push('css')
    <link rel="stylesheet" href="/css/iziToast.min.css">
    {{--    <link rel="stylesheet" href="/css/iziToast.min.css">--}}
    <style>


        .btn-download-foto {
            padding: 1px 5px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
            text-decoration: none;
        }
        .gallery-item {
            width: 100%;
            max-width: 250px;
        }
        .grid-gallery {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-column-gap: 10px;
            /*border: solid dimgray 3px;
            border-radius: 5px;*/
        }

    </style>
@endpush

@push('js')
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script src="/js/formAjaxCadastrar.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $(".select2").select2();
        })
    </script>
@endpush

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Comidas Típicas
                    <small>Visualizar</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('typical_food.index') }}"> Comidas Típicas</a></li>
                    <li class="breadcrumb-item active">Visualizar</li>
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
                    <div class="card-body">
                        <form>
                            <div class="card-body">
                                <div class="form-group" style="text-align: center">
                                    <p class="h1">{{ $typical_food->name }}</p>
                                </div>
                            <div class="form-group">
                                <label for="description">Descrição: </label>
                                {!!$typical_food->description!!}
                            </div>
                            <p class="h2">Galeria de Imagens</p>
                            <div class='grid-gallery'>
                                @foreach($typical_food->images as $image)
                                    <div class='grid-gallery-item'>
                                        <a href='{{ asset('files/' . $image->image->address) }}' class='btn-download-foto' download>
                                            <small>
                                                <span class='fas fa-download'></span>
                                            </small>
                                        </a>
                                        <br />
                                        <img src='{{ asset('files/' . $image->image->address) }}' data-src='{{ asset('files/' . $image->image->address) }}' class='img-responsive mklbItem' data-gallery='myGallery'><br />
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
