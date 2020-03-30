@extends('regimenes::layout')

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                {{ $lista->notificacion->informante }}: {{ $lista->regimen->nombre }} segun 
                @if($lista->notificacion->nota)
                    @lang('regimenes::regimenes.notificaciones_nota', ['nota' => $lista->notificacion->nota, 'fecha' => $lista->notificacion->fecha->format('d/m/Y')])
                @endif
                @if($lista->notificacion->organo)
                    @lang('regimenes::regimenes.notificaciones_organo', ['organo' => $lista->notificacion->organo, 'reunion' => $lista->notificacion->reunion, 'fecha' => $lista->notificacion->fecha->format('d/m/Y')])
                @endif

                @lang('regimenes::regimenes.notificaciones_nota', ['nota' => $lista->notificacion->nota, 'fecha' => $lista->notificacion->fecha->format('d/m/Y')])
            </h3>
        </div>

        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th rowspan="2" style="width: 10%; text-align: center">#</th>
                        <th rowspan="2" style="width: 10%; text-align: center">Código</th>
                        <th rowspan="2" style="width: 10%; text-align: center">Arancel</th>
                        <th colspan="5" style="width: 10%; text-align: center">Importaciones</th>
                        <th colspan="5" style="width: 10%; text-align: center">Exportaciones</th>
                    </tr>
                    <tr>
                        <th colspan="2" style="width: 10%; text-align: center">MERCOSUR</th>
                        <th colspan="2" style="width: 10%; text-align: center">Extrazona</th>
                        <th style="width: 10%; text-align: center">Total</th>

                        <th colspan="2" style="width: 10%; text-align: center">MERCOSUR</th>
                        <th colspan="2" style="width: 10%; text-align: center">Extrazona</th>
                        <th style="width: 10%; text-align: center">Total</th>
                    </tr>
                    @foreach($lista->items as $item)

                        @php($orden = $loop->iteration)

                        <tr>
                            <td style="text-align: center">{{ $orden }}</td>
                            <td style="text-align: center">{{ $item->codigo }}</td>

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