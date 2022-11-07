@extends('adminlte::page')
@section('title', 'Comidas Típicas - Visualizar')

@push('css')
    <link rel="stylesheet" href="/css/iziToast.min.css">
    <link href="{{ asset('css/mklb.css') }}" rel="stylesheet">
    <link href="{{ asset('css/galeria.css') }}" rel="stylesheet">

    <link href="{{ asset('css/showPage.css') }}" rel="stylesheet">

@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script src="/js/formAjaxCadastrar.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $(".select2").select2();
            window.addEventListener("load", function(event) {
                var myLayout = new MiniMasonry({
                    container: '.grid-gallery',
                });
            });
        })
    </script>
    <script src=" {{ asset('/js/minimasonry.min.js') }}" type="text/javascript"></script>
    <script src=" {{ asset('/js/mklb.js') }}" type="text/javascript"></script>
    <script src=" {{ asset('/js/carousel.js') }}" type="text/javascript"></script>
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
                        <form role="form" action="{{ route('typical_food.store') }}" method="post" class="jsonForm">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="card-body">
                                <div class="form-group" style="text-align: center">
                                    <p class="h1">{{ $typical_food->name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="description">Descrição: </label>
                                    {!!$typical_food->description!!}
                                </div>
                                @if(count($typical_food->images)>0)
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
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
