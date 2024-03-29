@extends('adminlte::page')
@section('title', 'Parceiro- Alterar')

@push('css')
    <link rel="stylesheet" href="/css/iziToast.min.css">
@endpush

@push('js')
    <script src=" {{ asset('js/bs-stepper.js') }}" type="text/javascript"></script>
    <script src="/js/formAjaxAlterar.js" type="text/javascript"></script>
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
    <script src="/js/jquery.mask.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".select2").select2();
            var options = {
                onKeyPress: function (phone, e, field, options) {
                    var masks = ['(00) 0000-00000', '(00) 00000-0000'];
                    var mask = (phone.length > 14) ? masks[1] : masks[0];
                    $('#telephone').mask(mask, options);
                }
            };
            $('#cnpj').mask('00. 000. 000/0000-00', options);
            $('#telephone').mask('(00) 0000-00000', options);
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
        })
        var stepper;
        $(document).ready(function(){
            var stepperEl = document.getElementById("stepper");
            stepper = new Stepper(stepperEl);
            // // $('#information-part').validate();
            //
            stepperEl.addEventListener('show.bs-stepper', function (partner) {
                if (!$('.jsonForm').valid()){
                    event.preventDefault()
                }
            })
            stepperEl.addEventListener('shown.bs-stepper', function(partner){
                $(".select2").select2();
            });

            $('.jsonForm').validate({
                errorClass: 'is-invalid',
            });

            $(".select2").select2();
        });

    </script>
@endpush

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Parceiro
                    <small>Alterar</small>
                </h1>

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partner.index') }}">Parceiro</a></li>
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
                    <form role="form" action="{{ route('partner.update', $partner->id) }}" class="jsonForm" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
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
                                <div class="step" data-target="#image-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="image-part" id="image-part-trigger">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Imagens</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Nome:</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="nome"value="{{ $partner->name}}" required  >
                                        </div>
                                        <div class="form-group">
                                            <label for="partner_type_id">Tipo:</label>
                                            <select name="partner_type_id" id="partner_type_id" class="form-control select2" required >
                                                <option value="">- Selecione um tipo-</option>
                                                @foreach($partner_type as $partner_type)
                                                    <option value="{{$partner_type->id}}" @if($partner_type->id==$partner->partner_type_id)selected @endif>{{$partner_type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="telephone">Telefone:</label>
                                            <input type="text" class="form-control telephone" id="telephone" name="telephone" placeholder="EX: (DD) 00000-0000" value="{{ $partner->telephone}}" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $partner->email}}" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="cnpj">CNPJ:</label>
                                            <input type="cnpj" class="form-control cnpj" id="cnpj" name="cnpj" placeholder="XX.XXX.XXX/XXXX-XX" value="{{ $partner->cnpj}}" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="site">Site:</label>
                                            <input type="text" class="form-control" id="site" name="site" placeholder="www.meusite.com.br" value="{{ $partner->site}}" >
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Descrição:</label>
                                            <textarea id="description" name="description" required>{{ $partner->description }}</textarea>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary" onclick="stepper.next()">Próximo</button>
                                            <button type="submit" class="btn btn-success">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="localization-part" class="content" role="tabpanel" aria-labelledby="localization-part-trigger">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="cities">Cidade:</label>
                                                <select name="cities" id="cities" class="form-control" required >
                                                    <option value="">- Selecione uma Cidade -</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}" @if($partner->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Rua:</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Rua exemplo 1111"required value="{{$partner->address}}" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="district">Bairro:</label>
                                                <input type="text" class="form-control" id="district" name="district" placeholder="" value="{{$partner->district}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="localization">Localização:</label>
                                                <input type="text" name="localization" id="localization" class="form-control" placeholder="Localização" value="{{ $partner->localization}}" >
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-info" onclick="stepper.previous()">Anterior</button>
                                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Próximo</button>
                                                <button type="submit" class="btn btn-success">Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="image-part" class="content" role="tabpanel" aria-labelledby="image-part-trigger">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h3>Imagens</h3>

                                            @include('partner.image')

                                        </div>
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" id="logo" name="logo" class="form-control-file">
                                            <label for="logo">Logo Antigo:</label>
                                            <img src="{{$partner->getUrlLogo()}}" alt="{{$partner->title}}" class="rounded float-leftl">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-info" onclick="stepper.previous()">Anterior</button>
                                        <button type="submit" class="btn btn-success btn-submit">Salvar</button>
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


