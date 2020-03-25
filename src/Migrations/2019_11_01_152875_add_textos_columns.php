<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class AddTextosColumns extends Migration
{
    public function up()
    {
        Schema::table(Ordenado::PREFIJO . Ordenado::TEXTOS, function (Blueprint $table)
        {
	        $table->string('formato')->default('1')->after('referencia');

	        $table->boolean('publicar')->default(true)->after('formato');

	        $table->json('naturaleza')->after('titulo');
        });
    }

    public function down()
    {
	    Schema::table(Ordenado::PREFIJO . Ordenado::TEXTOS, function (Blueprint $table)
	    {
		    $table->dropColumn('publicar');

		    $table->dropColumn('formato');

		    $table->dropColumn('naturaleza');
	    });
    }
}
