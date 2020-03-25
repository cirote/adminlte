@extends('ordenado::layout')

@section('content_header_title', __('ordenado::ordenado.tos'))
@section('content_header_description', '')

@section('main-content')
<div class="row">

	<div class="col-sm-1"></div>
	<div class="col-sm-10">

		<div class="row">
			<div class="col-sm-12">
				<h3>@lang('ordenado::ordenado.origen')</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3">
				<a href="{{ route('to.origen.1') }}" class="btn btn-block bg-olive btn-lg">Alternativa 1</a>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<a href="{{ route('to.origen.3') }}" class="btn btn-block bg-olive btn-lg">Alternativa 2</a>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<a href="{{ route('to.origen.2') }}" class="btn btn-block bg-olive btn-lg">Alternativa 3</a>
			</div>
		</div>

		<div class="row">
			<br>
			<br>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<h3>@lang('ordenado::ordenado.rei')</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3">
				<a href="{{ route('to.rei.1') }}" class="btn btn-block bg-olive btn-lg">Alternativa 1</a>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<a href="{{ route('to.rei.3') }}" class="btn btn-block bg-olive btn-lg">Alternativa 2</a>
			</div>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<a href="{{ route('to.rei.2') }}" class="btn btn-block bg-olive btn-lg">Alternativa 3</a>
			</div>
		</div>

	</div>

</div>
@endsection

