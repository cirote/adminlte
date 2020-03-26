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
	        $table->string('codigo');
            $table->float('arancel');
            $table->string('observaciones');
	        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(Regimenes::PREFIJO . Regimenes::LISTAS);
    }
}
