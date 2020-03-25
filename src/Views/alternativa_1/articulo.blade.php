@if($articulo->ultimaVersionVigente)

    @php($version = $articulo->ultimaVersionVigente)

    {!! $version->texto !!}

    @if($version->esOriginal)
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <blockquote class="pull-right"><small>{!! $version->fuente !!}</small></blockquote>
        </div>
    @else
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <blockquote class="pull-right" style="border-right-color: #4a8ef2"><small>{!! $version->fuente !!}</small></blockquote>
        </div>
    @endif

    @if($articulo->hayVersionesNoVigentes)
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <blockquote class="pull-right" style="border-right-color: #ea899a"><small>{!! $articulo->ultimaVersion->fuente !!}</small></blockquote>
        </div>
    @endif


    @foreach($version->complementos as $complemento)
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            @if($complemento->estaVigente)
                <blockquote class="pull-right" style="border-right-color: #4a8ef2"><small>{!! $complemento->fuente !!}</small></blockquote>
            @else
                <blockquote class="pull-right" style="border-right-color: #ea899a"><small>{!! $complemento->fuente !!}</small></blockquote>
            @endif
        </div>
    @endforeach

    @foreach($version->referencias as $referencia)
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
        @if($referencia->estaVigente)
            <blockquote class="pull-right" style="border-right-color: #4a8ef2"><small>{!! $referencia->fuente !!}</small></blockquote>
        @else
            <blockquote class="pull-right" style="border-right-color: #ea899a"><small>{!! $referencia->fuente !!}</small></blockquote>
        @endif
        </div>
    @endforeach

@else
    @lang('ordenado::ordenado.pendiente')
@endif
