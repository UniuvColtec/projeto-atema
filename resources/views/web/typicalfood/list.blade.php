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
            <h3 class="w-auto" style="color: var(--ci-color-green)">Listagem das Comidas Típicas</h3>
        </div>
        <div class="row row-cols-1 row-cols-md-3  px-3 px-md-0  ">
            @foreach( $typical_foods as $typical_food)
                <a class="my-3 m-md-0 " href="{{ route('web.typicalfood.show', $typical_food->id) }}">
                    <div class="card h-75 ">
                        <img class="card-img-top  imagem-list " style="height: 300px;" src="{{ asset('files/' . $typical_food->firstImage->image->address) }}" alt="{{ $typical_food->name }}">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <h5 class="card-title">{{ $typical_food->name }}</h5>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="d-flex justify-content-center pagination" >
            {!! $typical_foods->links()  !!}
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
