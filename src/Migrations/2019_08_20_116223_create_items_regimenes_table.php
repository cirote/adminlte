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
	        $table->string('codigo');
            $table->float('arancel')->nullable();
            $table->longText('observaciones')->nullable();
	        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(Regimenes::PREFIJO . Regimenes::ITEMS);
    }
}
