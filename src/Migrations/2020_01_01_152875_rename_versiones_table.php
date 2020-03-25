<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class RenameVersionesTable extends Migration
{
    public function up()
    {
	    Schema::rename(
		    Ordenado::PREFIJO . Ordenado::VERSIONES,
		    Ordenado::PREFIJO . Ordenado::VERSIONES_NUEVO
	    );
    }

    public function down()
    {
	    Schema::rename(
		    Ordenado::PREFIJO . Ordenado::VERSIONES_NUEVO,
		    Ordenado::PREFIJO . Ordenado::VERSIONES,
	    );
    }
}
