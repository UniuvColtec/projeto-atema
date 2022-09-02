@extends('web.base.page')
@push('css')
    <style>

        .imagem-list{
            max-height: 300px;
            min-height: 200px;
            min-width: 200px;
            max-width: 600px
        ;

        }
        .pagination{
           color:  var(--ci-color-green);
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
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="d-flex justify-content-center pagination" >
                {!! $partners->links()  !!}
            </div>
        </div>
            <div class="container-fluid" style="background: var(--ci-color-green)">
                <div class="container py-5">
                    <div class="row row-cols-1 row-cols-lg-2">
                        <h4 class="text-white my-3 my-md-4 my-lg-5">Cadastre-se na newsletter para ficar<br>informado sobre os próximos eventos</h4>
                        <form class="d-flex my-3 my-md-4 my-lg-5" role="search">
                            <input class="form-control rounded-5 bg-gray" type="search" placeholder="deixe seu e-mail aqui"
                                   aria-label="Search">
                        </form>
                    </div>
                </div>
            </div>
@stop
