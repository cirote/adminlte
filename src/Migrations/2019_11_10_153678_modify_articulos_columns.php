<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class ModifyArticulosColumns extends Migration
{
    public function up()
    {
	    Schema::table(Ordenado::PREFIJO . Ordenado::CONTENIDO, function (Blueprint $table)
	    {
		    $table->dropForeign(['version_id']);

		    $table->renameColumn('version_id', 'localizable_id');

		    $table->string('localizable_type')->after('version_id');
	    });

	    DB::select("ALTER TABLE " . Ordenado::PREFIJO . Ordenado::CONTENIDO . " COMMENT = 'Textos en diferentes idiomas'");
    }

    public function down()
    {
	    Schema::table(Ordenado::PREFIJO . Ordenado::CONTENIDO, function (Blueprint $table)
	    {
		    $table->renameColumn('localizable_id', 'version_id');

		    $table->foreign('version_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::VERSIONES);

		    $table->dropColumn('localizable_type');

		    DB::select("ALTER TABLE " . Ordenado::PREFIJO . Ordenado::CONTENIDO . " COMMENT = 'Textos de las diferentes versiones de los artículos'");
	    });
    }
}
