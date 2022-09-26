@extends('web.base.page')
@push('js')
    <script src=" {{ asset('js/bs-stepper.js') }}" type="text/javascript"></script>
    <script src="/js/formAjaxAlterar.js" type="text/javascript"></script>
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery.mask.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script>



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
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

    </script>
@endpush
@push('css')
    <style>
        .btn-download-foto {
            padding: 1px 5px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
            text-decoration: none;
        }
        .gallery-item {
            width: 100%;
        }
        .grid-gallery {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-column-gap: 10px;
            /*border: solid dimgray 3px;
            border-radius: 5px;*/
        }
        .grid-gallery-item img:hover {
            position: fixed;
            top: 50%; left: 50%;
            transform: translate(-50%,-50%);
            width: 1080px;
        }

        .imagem-list{
            max-height: 300px;
            min-height: 200px;
            min-width: 200px;
            max-width: 600px
        ;

        }
        .page-link{
            color:  var(--ci-color-green);
            background-color: white;
            --bs-btn-active-bg: var(--ci-color-green);
            !important;

        }
        .active>.page-link, .page-link.active{
            background-color: var(--ci-color-green);
            border-color: var(--ci-color-green);
        }




    </style>
@endpush
@push('js')
    <script src="/js/jquery.bootgrid.js"></script>
    <script src="/js/jquery.bootgrid.fa.js"></script>
    <script src="/js/iziToast.min.js" type="text/javascript"></script>
    <script src="/js/bootgrid.js"></script>
@endpush
@section('content')
        <div class="container pb-4">
            <div class="row justify-content-between py-3">
                <h3 class="w-auto" style="color: var(--ci-color-green)">Listagem dos Parceiros</h3>
            </div>

            <button type="button" class="btn" style="color: var(--ci-color-green)" data-toggle="modal" data-target="#exampleModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" style="color: var(--ci-color-green)" viewBox="0 0 16 16">
                    <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
                </svg>
                filtro
            </button>

            <div class="modal  row justify-content-between py-3" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Filtros:</h5>
                            <button type="button" class="close" style="color: var(--ci-color-green)" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="body">
                                <section class="section">
                                    <form action="{{route('web.partner')}}" method="GET">
                                        <div class="row valign-wrapper">
                                            <div class="form-group">
                                                <label for="cities">Cidade:</label>
                                                <select name="cities" id="cities" class="form-control select2" >
                                                    <option value="">- Selecione uma Cidade -</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="partner_types">Tipo:</label>
                                                <select name="partner_types" id="partner_types" class="form-control select2"  >
                                                    <option value="">- Selecione um tipo-</option>
                                                    @foreach($partner_types as $partner_type)
                                                        <option value="{{$partner_type->id}}">{{$partner_type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                        <button type="submit"  class=" btn" style="color: var(--ci-color-green)">
                                            Filtrar
                                        </button>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3  px-3 px-md-0  ">
                @foreach( $partners as $partner)
                    <a class="my-3 m-md-0 " href="{{ route('web.partner.show', $partner->id) }}">
                        <div class="card h-75 ">
                            <img class="card-img-top  imagem-list " style="height: 300px;" src="{{ asset('files/' . $partner->firstImage->image->address) }}" alt="{{ $partner->name }}">
                            <div class="card-body text-center d-flex flex-column justify-content-center">
                                <h5 class="card-title">{{ $partner->name }}</h5>
                                <div class="mt-2">
                                    <p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FFBB13" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                        {{ $partner->city->name . ' - ' . $partner->city->state }}
                                    </p>
                                </div>
                                <div class="mt-2">
                                    <p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FFBB13" class="bi bi-tag" viewBox="0 0 16 16">
                                            <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z"/>
                                            <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z"/>
                                        </svg>
                                        @foreach($partner_types as $partner_type)
                                            @if($partner_type->id == $partner->partner_type_id)
                                                <span class="badge rounded-pill text" style="background-color: var(--ci-color-green)" >{{$partner_type->name}}</span>

                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="d-flex justify-content-center pagination "  >
                {!! $partners->links()  !!}
            </div>
        </div>
        </div>
    @stop
@section('post_content')
    <div id="contato" class="container-fluid" style="background: var(--ci-color-green)">
        <div class="container py-5">
            <div class="row mt-4">
                <div class="col-6">
                    <img src="assets/img/atema-logo.png" class="img-fluid w-25">
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
@stop
