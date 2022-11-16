@extends('web.base.page')

@push('css')
    <link href="{{ asset('css/showPage.css') }}" rel="stylesheet">
@endpush
@push('js')
@endpush
@section('content')
    <div class="container my-5">
        <div class="container main-content">
            <h1 class="h1 text-center">Busca por: {{ $search }}</h1>
                <div class="col-md-10 mx-auto">
                    @foreach($results as $result)
                        <div>
                            <a href="{{ $result->url }}">
                                {{$result->id}}<br>
                                {{$result->name}}<br>
                                {!!  $result->description !!}<br>
                                <span class="badge bg-success">{{$result->type}}</span>

                            </a>
                        </div>
                    @endforeach
                </div>
        </div>
        </div>
    </div>

@stop
@section('post_content')
@stop
