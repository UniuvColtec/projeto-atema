@extends('adminlte::page')
@section('title', 'Pontos Turístico - Visualizar')

@push('css')
    <link rel="stylesheet" href="/css/iziToast.min.css">
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
                <h1>Pontos Turísticos
                    <small>Visualizar</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tourist_spot.index') }}"> Pontos Turístico</a></li>
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
                        <form action="{{ route('tourist_spot.destroy', ['tourist_spot' =>$tourist_spot->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="card-body">
                                <div class="form-group" style="text-align: center">
                                    <p class="h1">{{ $tourist_spot->name }}</p>
                                </div>

                        <div class="form-group">
                            <label for="description">Descrição:</label>
                            {!!$tourist_spot->description!!}
                        </div>
                        <div class="form-group">
                             <label for="address">Endereço:</label>
                            {{ $tourist_spot->city->name}}, {{ $tourist_spot->address }}, {{ $tourist_spot->district }}
                         </div>

                         <div class="form-group">
                             {!! $tourist_spot->renderMap($tourist_spot->latitude, $tourist_spot->longitude) !!}
                         </div>

                            <p class="h2">Galeria de Imagens</p>
                            <div class='grid-gallery'>
                                @foreach($tourist_spot->images as $image)
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

                    </div>
                </div>
            </div>
        </div>
@endsection
