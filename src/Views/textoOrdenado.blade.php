@extends('layouts.project')

@section('htmlheader_title', 'Regímenes Especiales de Importacion del MERCOSUR - Texto ordenado y comentado')

@section('styles')
    @parent
@endsection

@section('content_header')
    {{-- BECAUSE THIS PAGE POINTS TO AN IFRAME, WE CLEAN THIS SECTION AND PUT STATIC DATA --}}
    <section class="content-header">
        <h1>
            Regímenes Especiales de Importacion del MERCOSUR
            <small>Texto ordenado y comentado</small>
        </h1>
    </section>
@endsection

@section('main-content')
    <iframe src="{{ env('SAREM_URL', 'https://sarem.mercosur.int') }}/texto/rei?le={{ App::getLocale() }}&amp;sesion={{ session()->getId() }}" style="background-color: #FFFFFF; width: 100%; height: 52vw;" frameborder="0"></iframe>
@endsection

@section('scripts')
    @parent
@endsection
