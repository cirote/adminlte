<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class CreateCapitulosTable extends Migration
{
    public function up()
    {
        Schema::create(Ordenado::PREFIJO . Ordenado::CAPITULOS, function (Blueprint $table)
        {
            $table->increments('id');

	        $table->integer('texto_id')->unsigned();
	        $table->index('texto_id');
	        $table->foreign('texto_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::TEXTOS);

            $table->bigInteger('orden')->unsigned();
            $table->string('numero');
            $table->json('titulo');
            $table->timestamps();
        });

	    DB::select("ALTER TABLE " . Ordenado::PREFIJO . Ordenado::CAPITULOS . " COMMENT = 'Capitulos del texto ordenado'");
    }

    public function down()
    {
	    Schema::dropIfExists(Ordenado::PREFIJO . Ordenado::CAPITULOS);
    }
}
