<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Regimenes\Config\Regimenes;

class CreateObservacionesItemsTable extends Migration
{
    public function up()
    {
        Schema::create(Regimenes::PREFIJO . Regimenes::OBSERVACIONES, function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('item_id')->unsigned()->index()->refers()->on(Regimenes::PREFIJO . Regimenes::ITEMS);
	        $table->longText('observacion');
	        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(Regimenes::PREFIJO . Regimenes::OBSERVACIONES);
    }
}
