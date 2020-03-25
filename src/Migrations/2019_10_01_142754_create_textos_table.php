<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class CreateTextosTable extends Migration
{
   public function up()
    {
        Schema::create(Ordenado::PREFIJO . Ordenado::TEXTOS, function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('referencia')->unique();
            $table->json('titulo');
            $table->timestamps();

            $table->index('referencia');
        });

	    DB::select("ALTER TABLE " . Ordenado::PREFIJO . Ordenado::TEXTOS . " COMMENT = 'Textos ordenados'");
    }

    public function down()
    {
	    Schema::dropIfExists(Ordenado::PREFIJO . Ordenado::TEXTOS);
    }
}
