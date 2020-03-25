<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class AddVersionesColumns extends Migration
{
    public function up()
    {
        Schema::table(Ordenado::PREFIJO . Ordenado::VERSIONES, function (Blueprint $table)
        {
	        $table->json('texto_fuente')->nullable()->default(null)->after('original');
        });
    }

    public function down()
    {
	    Schema::table(Ordenado::PREFIJO . Ordenado::VERSIONES, function (Blueprint $table)
	    {
		    $table->dropColumn('texto_fuente');
	    });
    }
}
