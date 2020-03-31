<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Regimenes\Config\Regimenes;

class CreateListasRegimenesTable extends Migration
{
    public function up()
    {
        Schema::create(Regimenes::PREFIJO . Regimenes::LISTAS, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('notificacion_id')->unsigned()->index()->refers()->on(Regimenes::PREFIJO . Regimenes::NOTIFICACIONES);
            $table->string('regimen_id')->index()->refers()->on(Regimenes::PREFIJO . Regimenes::REGIMENES);
            $table->string('tipo');
            $table->integer('anio');
            $table->integer('semestre')->nullable()->default(null);
            $table->integer('trimestre')->nullable()->default(null);
	        $table->string('archivo');
            $table->string('descargar')->nullable()->default(null);
            $table->string('importaciones_mercosur')->nullable()->default(null);
            $table->string('importaciones_extrazona')->nullable()->default(null);
            $table->string('exportaciones_mercosur')->nullable()->default(null);
            $table->string('exportaciones_extrazona')->nullable()->default(null);
            $table->string('hoja')->nullable();
	        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(Regimenes::PREFIJO . Regimenes::LISTAS);
    }
}
