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
    </style>
@endpush
@push('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-md-6">
            <h2>{{ $typical_food->name }}</h2>
        </div>
        </div>
        <div class="col-12 col-md-6 d-flex flex-column flex-lg-row justify-content-between gap-2 gap-md-0 mt-3 mt-lg-0">
            <div class="d-flex align-items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#FFBB13" class="bi bi-map-fill"
                     viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z"/>
                </svg>
                @foreach($typical_food->cities as $city)
                    <span class="badge rounded-pill text" style="background-color: var(--ci-color-green)" >{{ $city->name }}</span>
                @endforeach
            </div>
        </div>
    </div>


    <div class="row my-5">
        <div class="col-12 col-xl-6">
            <div id="sliderEvento" class="carousel slide w-100 sliderEvento" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#sliderEvento" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#sliderEvento" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('files/' . $typical_food->firstImage->image->address) }}" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('files/' . $typical_food->firstImage->image->address) }}" class="d-block w-100" alt="">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#sliderEvento"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#sliderEvento"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>


        <div class="text-justify my-4 col-12 col-xl-6">
            {!!$typical_food->description!!}
            <button type="button" class="btn "  style="color: var(--ci-color-green)"  data-toggle="modal" data-target="#imageModal">
                Galeria de Imagens
            </button>
            <a href="#" class="btn-cta-contato py-2 px-3 my-2" style="color: var(--ci-color-green)" >Entre em contato com a organização</a>
        </div>

        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLongTitle">Galeria de Imagens</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class='grid-gallery'>
                            @if($typical_food->typical_food_images)
                                @foreach($typical_food->typical_food_images as $image)
                                    <div class='grid-gallery-item'>
                                        <a href='{{ asset('files/' . $image->image->address) }}' class='btn-download-foto' download>
                                            <small><span class='fas fa-download'></span></small>
                                        </a>
                                        <br>
                                        <img src='{{ asset('files/' . $image->image->address) }}' data-src='{{ asset('files/' . $image->image->address) }}' class='img-responsive mklbItem gallery-item' data-gallery='myGallery'>
                                        <br>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn " style="color: var(--ci-color-green)"  data-dismiss="modal">Close</button>
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
@stop
