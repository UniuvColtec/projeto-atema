@extends('web.base.page')

@push('css')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://uniuv.edu.br/css/mklb.css" />
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/showPage.css') }}" rel="stylesheet">
    <style>
        @media screen and (max-width: 999px){
            .grid-inputs {
                display: grid;
                grid-template-rows: 1fr 1fr;
                gap: 1rem;
            }
        }
        @media screen and (min-width: 1000px){
            .grid-inputs {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
            }
        }

    </style>



@endpush
@push('js')
    <script src=" {{ asset('js/bs-stepper.js') }}" type="text/javascript"></script>
    <script src="/js/formAjaxAlterar.js" type="text/javascript"></script>
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery.mask.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('js/bs-stepper.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/formAjaxAlterar.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            var options = {
                onKeyPress: function (phone, e, field, options) {
                    var masks = ['(00) 0000-00000', '(00) 00000-0000'];
                    var mask = (phone.length > 14) ? masks[1] : masks[0];
                    $('#telephone').mask(mask, options);
                }
            };
            $('#cnpj').mask('00.000.000/0000-00', options);
            $('#telephone').mask('(00) 0000-00000', options);


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
        })

        function verify() {
            if(document.getElementById('description').value == ''){
                alert("Descrição deve ser preenchida");
            } else {
                stepper.next();
            }
        }

    </script> <script src=" {{ asset('js/bs-stepper.js') }}" type="text/javascript"></script>
    <script src="/js/formAjaxAlterar.js" type="text/javascript"></script>
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery.mask.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function(){
            var options = {
                onKeyPress: function (phone, e, field, options) {
                    var masks = ['(00) 0000-00000', '(00) 00000-0000'];
                    var mask = (phone.length > 14) ? masks[1] : masks[0];
                    $('#telephone').mask(mask, options);
                }
            };
            $('#cnpj').mask('00.000.000/0000-00', options);
            $('#telephone').mask('(00) 0000-00000', options);
        })

    </script>

@endpush
@section('content')
    <div class="container my-5">
        <div class="container main-content">
            <p class="h1 text-center">Sugestão de evento</p>
                <div class="col-md-10 jumbotron mx-auto">
                    <form action="{{url('/contact')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group main-content">
                            <div class="form-group">
                                <label>Nome do evento:</label>
                                <input type="text" name="name" class="form-control" placeholder="Insira o nome do evento">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telefone:</label>
                                <input type="text" class="form-control  telephone" id="telephone" name="telephone" placeholder="EX: (DD) 00000-0000 " required >
                            </div>
                            <div class="grid-inputs">
                                <div class="form-group">
                                    <label>Nome do organizador:</label>
                                    <input type="text" name="name_org" class="form-control" placeholder="Insira o nome do organizador"required>
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" name="email" class="form-control" placeholder="Insira o email para contato" required>
                                </div>
                            </div>
                            <div class="grid-inputs">
                                <div class="form-group">
                                    <label for="address">Endereço:</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Endereço -Campo obrigatório-" required>
                                </div>
                                <div class="form-group">
                                    <label for="city">Cidade:</label>
                                    <input name="city" id="name" class="form-control" placeholder="-Campo obrigatório-" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição:</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Descrição do evento" required></textarea>
                            </div>
                            <div class="grid-inputs">
                                <div class="form-group">
                                    <label for="start_date">Data de início:</label>
                                    <input type="datetime-local" name="start_date" id="start_date" class="form-control" placeholder="Data de início" required>
                                </div>
                                <div class="form-group">
                                    <label for="final_date">Data de encerramento:</label>
                                    <input type="datetime-local" name="final_date" id="final_date" class="form-control"   placeholder="Data de encerramento" required >
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit " class="btn " style="color: var(--ci-color-green)"  >Enviar</button>
                    </form>
                </div>
@stop
@section('post_content')
    <div id="contato" class="container-fluid" style="background: var(--ci-color-green)">
        <div class="container py-5">
            <div class="row mt-4">
                <div class="col-6">
                    <img src="/assets/img/atema-logo.png" class="img-fluid w-25">
                </div>
                <div class="col-6">
                    <p class="d-flex gap-2 align-items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg> (42) 3521 2050
                    </p>
                    <p class="d-flex gap-2 align-items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg> atematurismo@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="container-fluid" style="background: var(--ci-color-green)">
        <div class="container py-5">
            <div class="row row-cols-1 row-cols-lg-2">
                <h4 class="text-white my-3 my-md-4 my-lg-5">Cadastre-se na newsletter para ficar<br>informado sobre os
                    próximos eventos
                </h4>
                <form class="d-flex my-3 my-md-4 my-lg-5" role="search">
                    <input class="form-control rounded-5 bg-gray" type="search" placeholder="deixe seu e-mail aqui"
                           aria-label="Search">
                </form>
            </div>
        </div>
    </div>
    -->
@stop
