@extends('regimenes::layout')

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                {{ $lista->notificacion->informante }}: {{ $lista->regimen->nombre }} segun 
                @lang('regimenes::regimenes.notificaciones_nota', ['nota' => $lista->notificacion->nota, 'fecha' => $lista->notificacion->fecha->format('d/m/Y')])
            </h3>
        </div>

        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <th style="width: 10%; text-align: center">#</th>
                        <th style="width: 10%; text-align: center">Código</th>
                        <th style="width: 10%; text-align: center">Arancel Nacional</th>
                        <th style="width: 70%; text-align: left">Observaciones</th>
                    </tr>
                    @foreach($lista->items as $item)

                        @php($orden = $loop->iteration)
                        @php($observaciones = $item->observaciones)

                        @if($observaciones->count())
                            @foreach($item->observaciones as $observacion)
                                <tr>
                                    @if($loop->first)
                                        <td style="text-align: center">{{ $orden }}</td>
                                        <td style="text-align: center">{{ $item->codigo }}</td>
                                        <td style="text-align: center">{{ $item->arancel }}</td>
                                    @else
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
                                <td></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection