@extends('regimenes::layout')

@section('content_header_title', __('regimenes::regimenes.reis'))
@section('content_header_description', '')

@section('main-content')
<div class="row">

	<div class="col-sm-1"></div>
	<div class="col-sm-10">

		<div class="row">
			<div class="col-sm-12">
				<h3>@lang('regimenes::regimenes.composicion')</h3>
			</div>
		</div>
		<div class="row">
			@foreach($regimenes as $regimen)
				@if($regimen->composicion)
					<div class="col-sm-12 col-md-6 col-lg-6">
						<a href="{{ route('regimenes.composicion', ['regimen' => $regimen]) }}" class="btn btn-block bg-olive btn-lg">{{ $regimen->nombre }}</a>
						<br>
					</div>
				@endif
			@endforeach
		</div>

		<div class="row">
			<br>
			<br>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<h3>@lang('regimenes::regimenes.utilizacion')</h3>
			</div>
		</div>
		<div class="row">
			@foreach($regimenes as $regimen)
				@if($regimen->utilizacion)
					<div class="col-sm-12 col-md-6 col-lg-6">
						<a href="{{ route('regimenes.utilizacion', ['regimen' => $regimen]) }}" class="btn btn-block bg-olive btn-lg">{{ $regimen->nombre }}</a>
						<br>
					</div>
				@endif
			@endforeach
		</div>

	</div>

</div>
@endsection

