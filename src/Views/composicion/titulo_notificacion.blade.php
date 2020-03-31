@if($e->notificacion->nota)
    @lang('regimenes::regimenes.notificaciones_nota', [
    	'nota'    => $e->notificacion->nota, 
    	'fecha'   => $e->notificacion->fecha->format('d/m/Y'),
    	'periodo' => __('regimenes::regimenes.notificaciones_periodo', [
            'numero'  => $periodo->periodo,
            'periodo' => __("regimenes::regimenes.{$regimen->composicion}"),
            'ano'     => $periodo->anio
        ])
    ])
@endif

@if($e->notificacion->organo)
    @lang('regimenes::regimenes.notificaciones_organo', ['organo' => $e->notificacion->organo, 'reunion' => $e->notificacion->reunion, 'fecha' => $e->notificacion->fecha->format('d/m/Y')])
@endif
