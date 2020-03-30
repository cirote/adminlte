<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Regimenes\Config\Regimenes;

class CreateItemsRegimenesTable extends Migration
{
    public function up()
    {
        Schema::create(Regimenes::PREFIJO . Regimenes::ITEMS, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lista_id')->unsigned()->index()->refers()->on(Regimenes::PREFIJO . Regimenes::LISTAS);
	        $table->string('codigo');
            $table->float('arancel')->nullable()->default(null);
            $table->double('importaciones_extrazona')->nullable()->default(null);
            $table->double('importaciones_mercosur')->nullable()->default(null);
            $table->double('exportaciones_extrazona')->nullable()->default(null);
            $table->double('exportaciones_mercosur')->nullable()->default(null);
            $table->date('inclusion')->nullable()->default(null);
            $table->date('finalizacion')->nullable()->default(null);
	        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(Regimenes::PREFIJO . Regimenes::ITEMS);
    }
}
