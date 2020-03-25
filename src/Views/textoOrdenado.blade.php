@extends('ordenado::layout')

@section('content_header_title', $texto->titulo)
@section('content_header_description', $texto->naturaleza)

@section('main-content')
<div class="row">

	<div class="col-sm-1"></div>
	<div class="col-sm-10">

		<div class="row">
			<div class="col-sm-12">
				@if(View::exists("ordenado::{$texto->referencia}.disclaimer"))
					@include("ordenado::{$texto->referencia}.disclaimer")
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				@foreach($texto->capitulos as $capitulo)

{{--			@php($abierto = $loop->first ? true : false)--}}
				@php($abierto = false)

				@include("ordenado::$alternativa.capitulos")
				@endforeach
			</div>
		</div>

	</div>
</div>
@endsection

