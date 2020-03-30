<tr>
    <td style="text-align: center">
        @lang('regimenes::regimenes.notificaciones_trimestre', ['trimestre' => $periodo->trimestre, 'ano' => $periodo->anio])
    </td>

    @foreach(['ARG', 'BRA', 'PRY', 'URY'] as $informante)

        @php(
            $e = $regimen->listas->filter
            (
                function ($lista) use ($periodo, $informante)
                {  
                    return $lista->notificacion->informante == $informante && $lista->anio == $periodo->anio && $lista->trimestre == $periodo->trimestre; 
                }
            )
            ->first()
        )

        @if($e)
            <td style="text-align: center">
                <a href="{{ route('regimenes.utilizacion.items', ['lista' => $e]) }}" class="product-title">
                    @if($e->notificacion->nota)
                        @lang('regimenes::regimenes.notificaciones_nota', ['nota' => $e->notificacion->nota, 'fecha' => $e->notificacion->fecha->format('d/m/Y')])
                    @endif
                    @if($e->notificacion->organo)
                        @lang('regimenes::regimenes.notificaciones_organo', ['organo' => $e->notificacion->organo, 'reunion' => $e->notificacion->reunion, 'fecha' => $e->notificacion->fecha->format('d/m/Y')])
                    @endif
                </a>&nbsp;
                @if($e->notificacion->nota)
                    <a href="{{ route('regimenes.lista.nota', ['lista' => $e]) }}" class="product-title"><i class="fa fa-clone"></i></a> &nbsp;
                @endif
                @if($e->notificacion->organo)
                    <a href="{{ $e->notificacion->link }}" class="product-title"><i class="fa fa-link"></i></a> &nbsp;
                @endif
                <a href="{{ route('regimenes.lista.tabla', ['lista' => $e]) }}" class="product-title"><i class="fa fa-table"></i></a>
            </td>
            @else
            <td></td>
        @endif

    @endforeach
</tr>
