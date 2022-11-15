@extends('web.base.page')

@push('css')
@endpush
@push('js')

    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery.mask.js"></script>

    <script>
        $(document).ready(function(){
            var options = {
                onKeyPress: function (phone, e, field, options) {
                    var masks = ['(00) 0000-00000', '(00) 00000-0000'];
                    var mask = (phone.length > 14) ? masks[1] : masks[0];
                    $('#telephone').mask(mask, options);
                }
            };
            $('#telephone').mask('(00) 0000-00000', options);
        })

    </script>
    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
@endpush
@section('content')
    <div class="container my-5">
        <div class="container main-content">
            <p class="h1 text-center">Sugestão de evento</p>
                <div class="col-md-10 jumbotron mx-auto">
                    <form  action="{{url('/contact')}}" class="jsonForm" method="post" enctype="multipart/form-data">
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
                                    <label for="city">Cidade*</label>
                                    <select name="city" id="city" class="form-control select2" required>
                                        <option value="">- Selecione uma Cidade -</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->name}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição:</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Descrição do evento" required></textarea>
                            </div>
                            <div class="grid-inputs">
                                <div class="form-group">
                                    <label for="start_date">Data de início:</label>
                                    <input type="datetime-local" name="start_date" id="start_date" class="form-control" placeholder="Data de início" required value="{{ $todays_date }}" min="{{$todays_date}}"></div>
                                <div class="form-group">
                                    <label for="final_date">Data de encerramento:</label>
                                    <input type="datetime-local" name="final_date" id="final_date" class="form-control" placeholder="Data de encerramento" required value="{{ $todays_date }}" min="{{$todays_date}}"></div>
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-4">
                            <div class="captcha {{$errors->has('captcha') ? :""}}">
                                    <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">&#x21bb;
                                </button>
                            </div>
                            <br>
                            <input id="captcha" type="text" class="form-control" placeholder="insira o Captcha" name="captcha">
                            @if ($errors->has('captcha'))
                                <div class="alert alert-danger">
                                    {{$errors->first('captcha')}}
                                </div><br />
                            @endif
                        </div>
                        <br>
                        <button id="buttonload" type="submit" name="buttonload" class="btn btn-success btn-submit"  style="background-color: #0a8f72; color: white" >Enviar</button>
                    </form>
                </div>
        </div>
        </div>
    </div>

@stop
@section('post_content')
    <div id="contato" class="container-fluid" style="background: #0a8f72">
        <div class="container py-5">
            <div class="row mt-4">
                <div class="col-6">
                    <img src="/assets/img/SulPR_logo_horizontal_transparente.png" class="img-fluid w-25">
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
