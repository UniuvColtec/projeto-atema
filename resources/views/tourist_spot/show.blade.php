@extends('adminlte::page')
@section('title', 'Pontos Turístico - Exibir')

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
                <h1>Pontos Turistico
                    <small>Exibir</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tourist_spot.index') }}"> Pontos Turístico</a></li>
                    <li class="breadcrumb-item active">Exibir</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <h1> Pontos Turísticos - Exibir</h1>
                    <div class="card-body">
                        <form action="{{ route('tourist_spot.destroy', ['tourist_spot' =>$tourist_spot->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                        <div class="form-group">
                            <label for="id">ID: </label>
                            {{ $tourist_spot->id }}
                            </div>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            {{ $tourist_spot->name }}
                            </div>
                        <div class="form-group">
                            <label for="cities">Cidade:</label>
                            {{ $tourist_spot->city->name}}
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição:</label>
                            {!!$tourist_spot->description!!}
                        </div>
                        <div class="form-group">
                            <label for="address">Endereço:</label>
                            {{ $tourist_spot->address }}
                        </div>
                            <div class="form-group">
                                <label for="localization">Localização:</label>
                                <br>
                                <iframe src="https://maps.google.com/maps?q={{ $tourist_spot->latitude }},{{ $tourist_spot->longitude }}&hl=pt-br&z=17&amp;output=embed"
                                        width="600"
                                        height="450"
                                        style="border:0;"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        <div class="form-group">
                            <label for="district">Distrito:</label>
                            {{ $tourist_spot->district }}
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
