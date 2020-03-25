<div class="box box-danger collapsed-box">

    <div class="box-header with-border">
        <h3 class="box-title">
            @lang('ordenado::ordenado.disclaimer')
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
    </div>

    <div class="box-body">
        @if(\App::getLocale() == 'es')
            @include("ordenado::{$texto->referencia}.disclaimer_es")
        @else
            @include("ordenado::{$texto->referencia}.disclaimer_pt")
        @endif
    </div>

</div>