@extends('ordenado::layout')

@section('content_header_title', $capitulo->titulo . ' - ' . $capitulo->textoOrdenado->titulo)
@section('content_header_description', $capitulo->textoOrdenado->naturaleza)

@section('main-content')
<div class="row">

    <div class="col-sm-1"></div>
    <div class="col-sm-10">

        <div class="row">
            <div class="col-sm-12">
                @php($articuloAbierto = true)
                @php($alternativa = 'alternativa_1')
                @include("ordenado::alternativa_1.articulos")
            </div>
        </div>

    </div>
</div>
@endsection