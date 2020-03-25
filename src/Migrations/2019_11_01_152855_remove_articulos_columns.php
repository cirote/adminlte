<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class RemoveArticulosColumns extends Migration
{
    public function up()
    {
        Schema::table(Ordenado::PREFIJO . Ordenado::ARTICULOS, function (Blueprint $table)
        {
	        $table->dropForeign(['texto_id']);
	        $table->dropIndex(['texto_id']);
	        $table->dropColumn('texto_id');

	        $table->dropForeign(['capitulo_id']);
	        $table->dropIndex(['capitulo_id']);
	        $table->dropColumn('capitulo_id');

	        $table->dropColumn('orden');
	        $table->dropColumn('numero_to');

	        $table->boolean('publicar')->default(true)->after('numero');
        });
    }

    public function down()
    {
	    Schema::table(Ordenado::PREFIJO . Ordenado::ARTICULOS, function (Blueprint $table)
	    {
		    $table->integer('texto_id')->unsigned()->nullable()->after('id');
		    $table->index('texto_id');
		    $table->foreign('texto_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::TEXTOS);

		    $table->integer('capitulo_id')->unsigned()->nullable()->after('texto_id');
		    $table->index('capitulo_id');
		    $table->foreign('capitulo_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::CAPITULOS);

		    $table->bigInteger('orden')->unsigned()->after('norma_id');

		    $table->string('numero_to')->nullable()->after('numero');

		    $table->dropColumn('publicar');
	    });
    }
}
