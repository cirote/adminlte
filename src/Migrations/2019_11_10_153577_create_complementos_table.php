<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class CreateComplementosTable extends Migration
{
    public function up()
    {
        Schema::create(Ordenado::PREFIJO . Ordenado::COMPLEMENTOS, function (Blueprint $table)
        {
            $table->increments('id');

	        $table->integer('version_id')->unsigned()->nullable();
	        $table->index('version_id');
	        $table->foreign('version_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::VERSIONES);

	        $table->integer('norma_id')->unsigned()->nullable();
	        $table->index('norma_id');
	        $table->foreign('norma_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::NORMAS);

            $table->timestamps();
        });

	    DB::select("ALTER TABLE " . Ordenado::PREFIJO . Ordenado::COMPLEMENTOS . " COMMENT = 'Normas que complementan la versión del artículo'");
    }

    public function down()
    {
	    Schema::dropIfExists(Ordenado::PREFIJO . Ordenado::COMPLEMENTOS);
    }
}
