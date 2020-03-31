<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Regimenes\Config\Regimenes;

class CreateRegimenesTable extends Migration
{
    public function up()
    {
        Schema::create(Regimenes::PREFIJO . Regimenes::REGIMENES, function (Blueprint $table) 
        {
            //  $table->increments('id');
	        $table->string('id');
            $table->string('nombre');
            $table->json('paises');
            $table->string('composicion')->nullable();
            $table->string('utilizacion')->nullable();
	        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(Regimenes::PREFIJO . Regimenes::REGIMENES);
    }
}
