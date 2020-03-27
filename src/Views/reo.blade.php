@extends('regimenes::layout')

@section('main-content')
    <div class="row">
        <div class="col-md-12">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    @foreach($regimenes as $regimen)
                        @if ($loop->first)
                            <li class="active">
                        @else
                            <li class="">
                        @endif
                        <a href="#tab_{{ $regimen->id }}" data-toggle="tab" aria-expanded="true">
                            {{ $regimen->nombre }}
                        </a>
                        </li>
                    @endforeach
{{--                    <li class="dropdown">--}}
{{--                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">--}}
{{--                            Dropdown <span class="caret"></span>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>--}}

{{--                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>--}}

{{--                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>--}}
{{--                            <li role="presentation" class="divider"></li>--}}
{{--                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                </ul>
                <div class="tab-content">
                    @foreach($regimenes as $regimen)
                        @if ($loop->first)
                        <div class="tab-pane active" id="tab_{{ $regimen->id }}">
                        @else
                        <div class="tab-pane" id="tab_{{ $regimen->id }}">
                        @endif
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Notificaciones sobre la composición de la lista nacional</h3>
                            </div>

                            <div class="box-body no-padding">
                                <table class="table table-condensed">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10%; text-align: center">Periodo Notificado</th>
                                        <th style="width: 18%; text-align: center">Argentina</th>
                                        <th style="width: 18%; text-align: center">Brasil</th>
                                        <th style="width: 18%; text-align: center">Paraguay</th>
                                        <th style="width: 18%; text-align: center">Uruguay</th>
                                        <th style="width: 18%; text-align: center">Venezuela</th>
                                    </tr>
                                    @foreach($regimen->listas()->composicion()->periodos()->get() as $periodo)

                                    @php(
                                        $e = $regimen->listas->filter
                                        (
                                            function ($lista) use ($periodo)
                                            {  
                                                return $lista->notificacion->informante == 'ARG' && $lista->anio == $periodo->anio && $lista->semestre == $periodo->semestre; 
                                            }
                                        )
                                        ->first()
                                    )


                                    <tr>
                                        <td style="text-align: center">{{ $periodo->semestre }}º Semestre {{ $periodo->anio }}</td>
                                        @if($e)
                                            <td style="text-align: center">
                                                <a href="/rei/items" class="product-title">Nota {{ $e->notificacion->nota }} del 31/07/2019</a> &nbsp;
                                                <a href="/rei/nota" class="product-title"><i class="fa fa-clone"></i></a> &nbsp;
                                                <a href="/rei/tabla" class="product-title"><i class="fa fa-table"></i></a>
                                            </td>
                                            @else
                                            <td></td>
                                        @endif
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection