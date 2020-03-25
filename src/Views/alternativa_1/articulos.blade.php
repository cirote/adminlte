<div class="box box-info{{ $articuloAbierto ? '' : ' collapsed-box' }}">

    <div class="box-header with-border">

        <h3 class="box-title">{{ $articulo->titulo_completo }}</h3>

        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-{{ $articuloAbierto ? 'minus' : 'plus' }}"></i></button>
        </div>

    </div>

    <div class="box-body">
        @include("ordenado::$alternativa.articulo")
    </div>

</div>
