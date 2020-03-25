<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class CreateNormasTable extends Migration
{
   public function up()
    {
	    Schema::create(Ordenado::PREFIJO . Ordenado::TIPOS, function (Blueprint $table)
	    {
		    $table->increments('id');
		    $table->char('abreviatura', 3);
		    $table->json('tipo');
		    $table->timestamps();
	    });

	    DB::select("ALTER TABLE " . Ordenado::PREFIJO . Ordenado::TIPOS . " COMMENT = 'Tipos de normas existentes en el MERCOSUR'");

        Schema::create(Ordenado::PREFIJO . Ordenado::NORMAS, function (Blueprint $table)
        {
            $table->increments('id');

	        $table->integer('tipo_id')->unsigned();
	        $table->foreign('tipo_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::TIPOS);

	        $table->integer('numero')->unsigned();
	        $table->integer('año')->unsigned();

            $table->json('titulo');

	        $table->json('link');

            $table->date('aprobada_el');

	        $table->date('vigente_desde')->nullable();

            $table->timestamps();
        });

	    DB::select("ALTER TABLE " . Ordenado::PREFIJO . Ordenado::NORMAS . " COMMENT = 'Normas utilizadas para la elaboración de los textos ordenados'");
    }

    public function down()
    {
	    Schema::dropIfExists(Ordenado::PREFIJO . Ordenado::NORMAS);

	    Schema::dropIfExists(Ordenado::PREFIJO . Ordenado::TIPOS);
    }
}
