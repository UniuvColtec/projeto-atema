@extends('adminlte::page')
@section('title', 'Comidas Típicas - Cadastro')

@push('css')
    <link rel="stylesheet" href="/css/iziToast.min.css">
@endpush

@push('js')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script src="/js/formAjaxCadastrar.js" type="text/javascript"></script>
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

        if(!document.getElementById('buttonload').disabled) {

            document.getElementById('buttonload').onclick = function () {
                this.textContent = 'Carregando…';
                submitForm();
            }
        }
        else {
            document.getElementById('buttonload').onclick = function () {
                this.textContent = 'Salvar';
                submitForm();

            }
        }
    </script>
@endpush

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Comidas Típicas
                    <small>Cadastro</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('typical_food.index') }}"> Comidas Típicas</a></li>
                    <li class="breadcrumb-item active">Cadastro</li>
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
                    <form role="form" action="{{ route('typical_food.store') }}" method="post" class="jsonForm">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição:</label>
                                <textarea id="description" name="description" required></textarea>
                            </div>
                            <div class="card-body">
                                <h3>Imagens</h3>

                                @include('typical_food.image')

                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="buttonload" type="submit" name="buttonload" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
