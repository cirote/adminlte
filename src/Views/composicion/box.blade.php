<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">
            @include('regimenes::composicion.box_titulo')
        </h3>
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
                @include('regimenes::composicion.box_table_linea')
            @endforeach
            </tbody>
        </table>
    </div>
</div>
