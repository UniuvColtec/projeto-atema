@extends('adminlte::page')
@section('title', 'Eventos - Cadastro')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('js/bs-stepper.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/formAjaxAlterar.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery.mask.js"></script>
    <script>
        var stepper;
        $(document).ready(function(){
            var stepperEl = document.getElementById("stepper");
            stepper = new Stepper(stepperEl);

            stepperEl.addEventListener('show.bs-stepper', function (event) {
                if (!$('.jsonForm').valid()){
                    event.preventDefault()
                }
            })
            stepperEl.addEventListener('shown.bs-stepper', function(event){
                $(".select2").select2();
            });

            $('.jsonForm').validate({
                errorClass: 'is-invalid',

            });
            $(document).ready(function(){
                var options = {
                    onKeyPress: function (phone, e, field, options) {
                        var masks = ['(00) 0000-00000', '(00) 00000-0000'];
                        var mask = (phone.length > 14) ? masks[1] : masks[0];
                        $('#contact').mask(mask, options);
                    }
                };
                $('#cnpj').mask('00.000.000/0000-00', options);
                $('#contact').mask('(00) 0000-00000', options);


                $('#description').summernote({
                    placeholder: 'Insira a descrição aqui',
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

            })
        })
        function verify() {
            if (document.getElementById('description').value == '') {
                alert("Descrição deve ser preenchida");
            } else {
                stepper.next();
            }
        }
        function permit() {
            document.getElementById('permit').value = 1;
            alert("Cadastro do evento liberado.");
        }


    </script>
@endpush

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Eventos
                    <small>Cadastro</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('event.index') }}"> Eventos</a></li>
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
                    <form role="form" action="{{ route('event.store') }}" method="post" class="jsonForm" >
                        {{ csrf_field() }}
                            <div id="stepper" class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                  <!-- your steps here -->
                                  <div class="step" data-target="#information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                      <span class="bs-stepper-circle">1</span>
                                      <span class="bs-stepper-label">Informações</span>
                                    </button>
                                  </div>
                                  <div class="line"></div>
                                  <div class="step" data-target="#localization-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="localization-part" id="localization-part-trigger">
                                      <span class="bs-stepper-circle">2</span>
                                      <span class="bs-stepper-label">Localização</span>
                                    </button>
                                  </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#other-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="other-part" id="other-part-trigger">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Outros</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#image-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="image-part" id="image-part-trigger">
                                            <span class="bs-stepper-circle">4</span>
                                            <span class="bs-stepper-label">Imagens</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                <!-- your steps content here -->
                                <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Nome:*</label>
                                            <input name="name" id="name" class="form-control" placeholder="Nome " required>
                                        </div>
                                        <div class="form-group">
                                            <label for="subtitle">Subtítulo:</label>
                                            <input name="subtitle" id="subtitle" class="form-control" placeholder="Subtítulo">
                                        </div>

                                        <div class="form-group">
                                            <label for="contact">O evento ocorre anualmente:*</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="annual_calendar" id="annual_calendar_s" value="1" required>
                                                <label class="form-check-label" for="annual_calendar_s">
                                                    Sim
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="annual_calendar" id="annual_calendar_n" value="0" >
                                                <label class="form-check-label" for="annual_calendar_n">
                                                    Não
                                                </label>
                                            </div>
                                        </div>
                                            <br>



                                        <div class="form-group">
                                            <label for="contact">Telefone:*</label>
                                            <input type="text" class="form-control" id="contact" name="contact" placeholder="EX: (DD) 00000-0000 " required >
                                        </div>
                                        <div class="form-group">
                                            <label for="website">Url do site do evento:</label>
                                            <input type="text" name="website" id="website" class="form-control" placeholder="Url">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Descrição:*</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="Descrição" required></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="start_date">Data de início:*</label>
                                                    <input type="datetime-local" name="start_date" id="start_date" class="form-control" placeholder="Data de início" required value="{{ $todays_date }}" min="{{ $todays_date }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="final_date">Data de encerramento:*</label>
                                                    <input type="datetime-local" name="final_date" id="final_date" class="form-control" placeholder="Data de encerramento" required value="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d\TH:i:s') }}" min="{{ $todays_date }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary" onclick="verify()">Próximo</button>
                                    </div>
                                </div>
                                <div id="localization-part" class="content" role="tabpanel" aria-labelledby="localization-part-trigger">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="cities">Cidade*</label>
                                            <select name="cities" id="cities" class="form-control select2" required>
                                                <option value="">- Selecione uma Cidade -</option>
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Endereço:*</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Endereço " required>
                                        </div>
                                        <div class="form-group">
                                            <label for="district">Localidade:*</label>
                                            <input type="text" name="district" id="district" class="form-control" placeholder="localidade " required>
                                        </div>
                                        <div class="form-group">
                                            <label for="localization">Localização:*</label>
                                            <input type="text" name="localization" id="localization" class="form-control" placeholder="Localização " required>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-info" onclick="stepper.previous()">Anterior</button>
                                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Próximo</button>
                                    </div>
                                </div>
                                <div id="other-part" class="content" role="tabpanel" aria-labelledby="other-part-trigger">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="typical_foods">Comidas Típicas*</label>
                                            <select name="typical_foods[]" id="typical_foods" class="form-control select2" multiple required data-placeholder="Selecione uma ou mais comidas típicas" >
                                                @foreach($typical_foods as $typical_food)
                                                    <option value="{{$typical_food->id}}">{{$typical_food->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="categories">Categorias*</label>
                                            <select name="categories[]" id="categories" class="form-control select2 " multiple required data-placeholder="Selecione uma ou mais categorias" >
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-info" onclick="stepper.previous()">Anterior</button>
                                        <button type="button" class="btn btn-primary" onclick="stepper.next()">Próximo</button>
                                    </div>
                                </div>
                                <div id="image-part" class="content" role="tabpanel" aria-labelledby="image-part-trigger">
                                    <div class="card-body">
                                        <h3>Imagens</h3>

                                        @include('event.image')

                                    </div>
                                    <div class="form-group">
                                        <label for="logo">logo</label>
                                        <input type="file" id="logo" name="logo" class="form-control-file btn btn-outline-secondary">
                                    </div>
                                    <div class="form-group">
                                            <label for="video">Video</label>
                                            <input type="text" id="video" name="video" class="form-control" placeholder="Envie o link de um víeo para introduzir seu evento">
                                    </div>
                                    <input type="hidden" id="permit" name="permit">
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-info" onclick="stepper.previous()">Anterior</button>
                                        <button type="submit" id="buttonload" name="buttonload" class="btn btn-success btn-submit">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

