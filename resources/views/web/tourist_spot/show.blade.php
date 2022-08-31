@extends('web.base.page')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
    </style>
@endpush
@push('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush
@section('content')
    <div class="container my-5">
        <div class="col-12 col-md-6">
            <h2 class="display-4">{{ $tourist_spot->name }}</h2>

        </div>
        <div class="row">
            <div class="col-12 col-md-6 d-flex flex-column flex-lg-row justify-content-between gap-2 gap-md-0 mt-3 mt-lg-0">
                <div class="d-flex align-items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#FFBB13" class="bi bi-map-fill"
                         viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z"/>
                    </svg>
                    <span>{{ $tourist_spot->city->name . ' - ' . $tourist_spot->city->state }}</span>
                </div>
            </div>
        </div>


        <div class="row my-5">
            <div class="col-12 col-xl-6">
                <div id="sliderParceiro" class="carousel slide w-100 sliderParceiro" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#sliderParceiro" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#sliderParceiro" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('files/' . $tourist_spot->firstImage->image->address) }}" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('files/' . $tourist_spot->firstImage->image->address) }}" class="d-block w-100" alt="">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#sliderParceiro"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#sliderParceiro"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>



            <div class="col-12 col-xl-6 py-2 mt-3 mt-lg-0">
                <div class="d-flex justify-content-between col-7 gap-4">
                </div>
                <div class="d-flex align-items-center gap-1 text-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#98B54D" class="bi bi-geo-alt"
                         viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    {{ $tourist_spot->address }}, {{ $tourist_spot->district }}
                    <button type="button" class="btn" style="color: var(--ci-color-green)"data-toggle="modal" data-target="#mapModal">
                        Mapa
                    </button>
                    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mapModalLongTitle">Localização</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {!! $tourist_spot->renderMap($tourist_spot->latitude, $tourist_spot->longitude) !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn " style="color: var(--ci-color-green)"  data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-justify my-4"> {!!$tourist_spot->description!!}</div>
                <button type="button" class="btn " style="color: var(--ci-color-green)"  data-toggle="modal" data-target="#imageModal">
                    Galeria de Imagens
                </button>
                <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLongTitle">Galeria de Imagens</h5>
                                <button type="button" class="close" style="color: var(--ci-color-green)"  data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class='grid-gallery'>
                                    @foreach($tourist_spot->images as $image)
                                        <div class='grid-gallery-item'>
                                            <a href='{{ asset('files/' . $image->image->address) }}' class='btn-download-foto' style="color: var(--ci-color-green)"  download>
                                                <small><span class='fas fa-download'></span></small>
                                            </a>
                                            <br>
                                            <img src='{{ asset('files/' . $image->image->address) }}' data-src='{{ asset('files/' . $image->image->address) }}' class='img-responsive mklbItem gallery-item' data-gallery='myGallery'>
                                            <br>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn " style="color: var(--ci-color-green)"  data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#" class="btn-cta-contato py-2 px-3 my-2" style="color: var(--ci-color-green)" >Entre em contato com a organização</a>
            </div>
        </div>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
    </main>
@stop
