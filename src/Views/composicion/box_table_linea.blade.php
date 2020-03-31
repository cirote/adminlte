<tr>
    <td style="text-align: center">
        @lang('regimenes::regimenes.notificaciones_periodo', [
            'numero'  => $periodo->periodo,
            'periodo' => __("regimenes::regimenes.{$regimen->composicion}"),
            'ano'     => $periodo->anio
        ])
    </td>

    @foreach($regimen->paises as $informante)

        @php(
            $e = $regimen->listas->filter
            (
                function ($lista) use ($periodo, $informante, $regimen)
                {  
                    $propiedad = $regimen->composicion;

                    return $lista->notificacion->informante == $informante 
                        && $lista->anio == $periodo->anio 
                        && $lista->$propiedad == $periodo->periodo; 
                }
            )
            ->first()
        )

        @if($e)
            <td style="text-align: center">
                <a href="{{ route('regimenes.composicion.items', ['lista' => $e]) }}" class="product-title">
                    @include('regimenes::composicion.titulo_notificacion')
                </a>&nbsp;
                @include('regimenes::composicion.titulo_nota')
            </td>
        @else
            <td></td>
        @endif

    @endforeach
</tr>
