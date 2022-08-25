@extends('adminlte::page')
@section('title', 'Parceiro - Exibir')

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
                <h1>Parceiro
                    <small>Exibir</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partner.index') }}"> Parceiro</a></li>
                    <li class="breadcrumb-item active">Exibir</li>
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
@endsection
