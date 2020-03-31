@extends('regimenes::layout')

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">

                @php($nombrePeriodo = $lista->regimen->utilizacion)

                @if($lista->notificacion->nota)
                    @lang('regimenes::regimenes.notificaciones_titulo_nota', [
                        'pais' => __("regimenes::regimenes.{$lista->notificacion->informante}"),
                        'nombre' => $lista->regimen->nombre,
                        'nota' => $lista->notificacion->nota, 
                        'fecha' => $lista->notificacion->fecha->format('d/m/Y'),
                        'numero'  => $lista->$nombrePeriodo,
                        'periodo' => __("regimenes::regimenes.{$lista->regimen->utilizacion}"),
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
                        'periodo' => __("regimenes::regimenes.{$lista->regimen->utilizacion}"),
                        'ano'     => $lista->anio
                    ])
                @endif

            </h3>
        </div>

        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th rowspan="2" style="width: 10%; text-align: center">#</th>
                        <th rowspan="2" style="width: 10%; text-align: center">@lang('regimenes::regimenes.codigo')</th>
                        <th rowspan="2" style="width: 10%; text-align: center">@lang('regimenes::regimenes.arancel')</th>
                        <th colspan="5" style="width: 10%; text-align: center">@lang('regimenes::regimenes.importaciones')</th>
                        <th colspan="5" style="width: 10%; text-align: center">@lang('regimenes::regimenes.exportaciones')</th>
                    </tr>
                    <tr>
                        <th colspan="2" style="width: 10%; text-align: center">@lang('regimenes::regimenes.mercosur')</th>
                        <th colspan="2" style="width: 10%; text-align: center">@lang('regimenes::regimenes.extrazona')</th>
                        <th style="width: 10%; text-align: center">@lang('regimenes::regimenes.total')</th>

                        <th colspan="2" style="width: 10%; text-align: center">@lang('regimenes::regimenes.mercosur')</th>
                        <th colspan="2" style="width: 10%; text-align: center">@lang('regimenes::regimenes.extrazona')</th>
                        <th style="width: 10%; text-align: center">@lang('regimenes::regimenes.total')</th>
                    </tr>
                    @foreach($lista->items as $item)

                        @php($orden = $loop->iteration)

                        <tr>
                            <td style="text-align: center">{{ $orden }}</td>
                            <td style="text-align: center">{{ $item->codigoFormateado }}</td>

                            @if($item->arancel !== null)
                                <td style="text-align: center">
                                    {{ number_format($item->arancel, 2, ',', '.') }}
                                </td>
                            @else
                                <td></td>
                            @endif

                            @php($total = $item->importaciones_mercosur + $item->importaciones_extrazona)

                            @if($item->importaciones_mercosur)
                                <td style="text-align: center">
                                    {{ number_format($item->importaciones_mercosur, 2, ',', '.') }}
                                </td>
                                <td style="text-align: center">
                                    ({{ number_format(100 * $item->importaciones_mercosur / $total, 2, ',', '.') }}%)
                                </td>
                            @else
                                <td></td>
                                <td></td>
                            @endif

                            @if($item->importaciones_extrazona)
                                <td style="text-align: center">
                                    {{ number_format($item->importaciones_extrazona, 2, ',', '.') }}
                                </td>
                                <td style="text-align: center">
                                    ({{ number_format(100 * $item->importaciones_extrazona / $total, 2, ',', '.') }}%)
                                </td>
                            @else
                                <td></td>
                                <td></td>
                            @endif

                            <td style="text-align: center">
                                {{ number_format($total, 2, ',', '.') }}
                            </td>

                            @php($total = $item->exportaciones_mercosur + $item->exportaciones_extrazona)

                            @if($item->exportaciones_mercosur)
                                <td style="text-align: center">
                                    {{ number_format($item->exportaciones_mercosur, 2, ',', '.') }}
                                </td>
                                <td style="text-align: center">
                                    ({{ number_format(100 * $item->exportaciones_mercosur / $total, 2, ',', '.') }}%)
                                </td>
                            @else
                                <td></td>
                                <td></td>
                            @endif

                            @if($item->exportaciones_extrazona)
                                <td style="text-align: center">
                                    {{ number_format($item->exportaciones_extrazona, 2, ',', '.') }}
                                </td>
                                <td style="text-align: center">
                                    ({{ number_format(100 * $item->exportaciones_extrazona / $total, 2, ',', '.') }}%)
                                </td>
                            @else
                                <td></td>
                                <td></td>
                            @endif

                            @if($total)
                                <td style="text-align: center">
                                    {{ number_format($total, 2, ',', '.') }}
                                </td>
                            @else
                                <td></td>
                            @endif

                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection