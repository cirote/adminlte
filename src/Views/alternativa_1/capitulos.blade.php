<div class="box {{$capitulo->formato != 3 ? 'box-info' : 'box-success'}} {{ $abierto ? '' : ' collapsed-box' }}">

    <div class="box-header with-border">

        <h3 class="box-title">
            <strong>
                {{ $capitulo->titulo_completo }}
            </strong>
        </h3>

        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-{{ $abierto ? 'minus' : 'plus' }}"></i></button>
        </div>

    </div>

    <div class="box-body">

        @foreach($capitulo->articulos as $articulo)

{{--        @php($articuloAbierto = $loop->first ? true : false)--}}
            @php($articuloAbierto = $capitulo->articulos()->count() == 1 ? true : false)

            @include("ordenado::$alternativa.articulos")
        @endforeach

    </div>

</div>
