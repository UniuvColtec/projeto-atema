@extends('adminlte::page')
@section('title', 'Parceiro - Visualizar')

@push('css')
    {{--    <link rel="stylesheet" href="/css/iziToast.min.css">--}}
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
                <h1>Parceiro
                    <small>Visualizar</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partner.index') }}"> Parceiro</a></li>
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
                    <br>
                    <img src="{{$partner->getUrlLogo()}}" alt="{{$partner->title}}" class="align-self-center mr-3 border-success" style="max-width: 200px; max-height: 200px;">
                    <h2 class="text-center"> {{ $partner->name }}</h2>
                    <div class="card-body">
                        <form action="{{ route('partner.destroy', ['partner' =>$partner->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="">
                                {!!$partner->description!!}
                            </div>
                            <div class="container-fluid">
                                <label for="address">Endereço:</label>
                                {{ $partner->city->name }}, {{ $partner->address }}, {{ $partner->district }}
                                <label for="localization">Localização:</label>
                                <br>
                                {!! $partner->renderMap($partner->latitude, $partner->longitude) !!}
                            </div>
                            @if(count($partner->images)>0)
                                <p class="h2">Galeria de Imagens</p>
                                <div class='grid-gallery'>
                                    @foreach($partner->images as $image)
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
                            <div class="container-fluid">
                                <div style="display: flex; flex-direction: row; justify-content: space-evenly;">
                                    <div>
                                        <label class="nav-icon far fa-envelope"></label>
                                        {{ $partner->email }}
                                    </div>
                                    <div>
                                        <label class="fa-brands fa-firefox-browser"></label>
                                        {{ $partner->site }}
                                    </div>
                                    <div>
                                        <label class="fa-solid fa-phone"></label>
                                        {{ $partner->telephone}}
                                    </div>
                                    <div>
                                        <label for="cnpj">CNPJ:</label>
                                        {{ $partner->cnpj }}
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
    </main>
@endsection
