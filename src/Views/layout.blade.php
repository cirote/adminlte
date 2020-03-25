@extends('layouts.project')

@section('styles')
	@parent
	<script id="MathJax-script" async
		src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
	</script>
@endsection

@section('module_layout', 'layout-top-nav')

@section('main_header')
	<header class="main-header">
		<nav class="navbar navbar-static-top" role="navigation">
		</nav>
	</header>
@endsection

@section('content_header_description', __('ordenado::ordenado.to'))

@section('sidebar')
{{--	@include('layouts.partials.menus.sidebar_menu')--}}
@endsection

@section('content_header')
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			@parent()
		</div>
	</div>
@endsection
