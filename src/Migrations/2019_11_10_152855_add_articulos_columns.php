<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class AddArticulosColumns extends Migration
{
    public function up()
    {
	    Schema::table(Ordenado::PREFIJO . Ordenado::VERSIONES, function (Blueprint $table)
	    {
	        $table->boolean('original')->default(true)->after('numero_en_la_norma');
        });
    }

    public function down()
    {
	    Schema::table(Ordenado::PREFIJO . Ordenado::VERSIONES, function (Blueprint $table)
	    {
		    $table->dropColumn('original');
	    });
    }
}
