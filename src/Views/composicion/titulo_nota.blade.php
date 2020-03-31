@if($e->notificacion->nota)
    <a href="{{ route('regimenes.lista.nota', ['lista' => $e]) }}" class="product-title"><i class="fa fa-clone"></i></a> &nbsp;
@endif
@if($e->notificacion->organo)
    <a href="{{ $e->notificacion->link }}" class="product-title" target="_blank"><i class="fa fa-link"></i></a> &nbsp;
@endif
<a href="{{ route('regimenes.lista.tabla', ['lista' => $e]) }}" class="product-title"><i class="fa fa-table"></i></a>
