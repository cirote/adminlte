<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class CreateArticulosTable extends Migration
{
    public function up()
    {
        Schema::create(Ordenado::PREFIJO . Ordenado::ARTICULOS, function (Blueprint $table)
        {
            $table->increments('id');

	        $table->integer('texto_id')->unsigned()->nullable();
	        $table->index('texto_id');
	        $table->foreign('texto_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::TEXTOS);

	        $table->integer('capitulo_id')->unsigned()->nullable();
	        $table->index('capitulo_id');
	        $table->foreign('capitulo_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::CAPITULOS);

	        $table->integer('norma_id')->unsigned()->nullable();
	        $table->index('norma_id');
	        $table->foreign('norma_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::NORMAS);

	        $table->bigInteger('orden')->unsigned();

	        $table->string('numero');
	        $table->string('numero_to')->nullable();

	        $table->json('titulo');
            $table->timestamps();
        });

	    DB::select("ALTER TABLE " . Ordenado::PREFIJO . Ordenado::ARTICULOS . " COMMENT = 'Artículos del texto ordenado'");

	    Schema::create(Ordenado::PREFIJO . Ordenado::VERSIONES, function (Blueprint $table)
	    {
		    $table->increments('id');

		    $table->integer('articulo_id')->unsigned();
		    $table->foreign('articulo_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::ARTICULOS);

		    $table->integer('norma_id')->unsigned();
		    $table->foreign('norma_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::NORMAS);

		    $table->string('numero_en_la_norma');

		    $table->timestamps();
	    });

	    DB::select("ALTER TABLE " . Ordenado::PREFIJO . Ordenado::VERSIONES . " COMMENT = 'Versiones de un artículo'");

	    Schema::create(Ordenado::PREFIJO . Ordenado::CONTENIDO, function (Blueprint $table)
	    {
		    $table->increments('id');
		    $table->integer('version_id')->unsigned();
		    $table->foreign('version_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::VERSIONES);
		    $table->char('locale', 2);
		    $table->longText('contenido');

		    $table->timestamps();
	    });

	    DB::select("ALTER TABLE " . Ordenado::PREFIJO . Ordenado::CONTENIDO . " COMMENT = 'Textos de las diferentes versiones de los artículos'");
    }

    public function down()
    {
	    Schema::dropIfExists(Ordenado::PREFIJO . Ordenado::CONTENIDO);

	    Schema::dropIfExists(Ordenado::PREFIJO . Ordenado::VERSIONES);

	    Schema::dropIfExists(Ordenado::PREFIJO . Ordenado::ARTICULOS);
    }
}
