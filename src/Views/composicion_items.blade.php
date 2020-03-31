@extends('regimenes::layout')

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">

                @php($nombrePeriodo = $lista->regimen->composicion)

                @if($lista->notificacion->nota)
                    @lang('regimenes::regimenes.notificaciones_titulo_nota', [
                        'pais' => __("regimenes::regimenes.{$lista->notificacion->informante}"),
                        'nombre' => $lista->regimen->nombre,
                        'nota' => $lista->notificacion->nota, 
                        'fecha' => $lista->notificacion->fecha->format('d/m/Y'),
                        'numero'  => $lista->$nombrePeriodo,
                        'periodo' => __("regimenes::regimenes.{$lista->regimen->composicion}"),
                        'ano'     => $lista->anio
                    ])
                @endif

                @if($lista->notificacion->organo)
                    @lang('regimenes::regimenes.notificaciones_titulo_organo', [
                        'pais' => __("regimenes::regimenes.{$lista->notificacion->informante}"),
                        'nombre' => $lista->regimen->nombre,
                        'organo' => $lista->notificacion->organo, 
                        'reunion' => $lista->notificacion->reunion,
                        'fecha' => $lista->notificacion->fecha->format('d/m/Y'),
                        'numero'  => $lista->$nombrePeriodo,
                        'periodo' => __("regimenes::regimenes.{$lista->regimen->composicion}"),
                        'ano'     => $lista->anio
                    ])
                @endif

            </h3>
        </div>

        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th style="width: 10%; text-align: center">#</th>
                        <th style="width: 10%; text-align: center">@lang('regimenes::regimenes.codigo')</th>
                        <th style="width: 10%; text-align: center">@lang('regimenes::regimenes.arancel_nacional')</th>
                        <th style="width: 10%; text-align: center">@lang('regimenes::regimenes.desde')</th>
                        <th style="width: 10%; text-align: center">@lang('regimenes::regimenes.hasta')</th>
                        <th style="width: 70%; text-align: left">@lang('regimenes::regimenes.observaciones')</th>
                    </tr>
                    @foreach($lista->items as $item)

                        @php($orden = $loop->iteration)
                        @php($observaciones = $item->observaciones)

                        @if($observaciones->count())
                            @foreach($item->observaciones as $observacion)
                                <tr>
                                    @if($loop->first)
                                        <td style="text-align: center">{{ $orden }}</td>
                                        <td style="text-align: center">{{ $item->codigoFormateado }}</td>
                                        <td style="text-align: center">{{ $item->arancel }}</td>
                                        @if($item->inclusion)
                                            <td style="text-align: center">{{ $item->inclusion->format('d/m/Y') }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        @if($item->finalizacion)
                                            <td style="text-align: center">{{ $item->finalizacion->format('d/m/Y') }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif    
                                    <td style="text-align: left">{{ $observacion->observacion }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td style="text-align: center">{{ $orden }}</td>
                                <td style="text-align: center">{{ $item->codigo }}</td>
                                <td style="text-align: center">{{ $item->arancel }}</td>
                                @if($item->inclusion)
                                    <td style="text-align: center">{{ $item->inclusion->format('d/m/Y') }}</td>
                                @else
                                    <td></td>
                                @endif
                                @if($item->finalizacion)
                                    <td style="text-align: center">{{ $item->finalizacion->format('d/m/Y') }}</td>
                                @else
                                    <td></td>
                                @endif
                                <td></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
