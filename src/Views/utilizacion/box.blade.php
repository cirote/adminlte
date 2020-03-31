<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">
            @include('regimenes::utilizacion.box_titulo')
        </h3>
    </div>

    <div class="box-body no-padding">
        <table class="table table-condensed">
            <tbody>
            <tr>
                <th style="width: 10%; text-align: center">@lang("regimenes::regimenes.periodo_notificado")</th>
                @foreach($regimen->paises as $informante)
                    <th style="width: 18%; text-align: center">@lang("regimenes::regimenes.$informante")</th>
                @endforeach
            </tr>
            @foreach($regimen->listas()->utilizacion()->periodos($regimen->utilizacion)->get() as $periodo)
                @include('regimenes::utilizacion.box_table_linea')
            @endforeach
            </tbody>
        </table>
    </div>
</div>
