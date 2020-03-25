<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class CreatePivotTable extends Migration
{
    public function up()
    {
        Schema::create(Ordenado::PREFIJO . Ordenado::ARTICULOS . '_' . Ordenado::CAPITULOS, function (Blueprint $table)
        {
            $table->increments('id');

	        $table->integer('texto_id')->unsigned()->nullable();
	        $table->foreign('texto_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::TEXTOS);

	        $table->integer('capitulo_id')->unsigned()->nullable();
	        $table->foreign('capitulo_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::CAPITULOS);

	        $table->integer('articulo_id')->unsigned()->nullable();
	        $table->foreign('articulo_id')->references('id')->on(Ordenado::PREFIJO . Ordenado::ARTICULOS);

	        $table->bigInteger('orden')->unsigned()->default(1);

	        $table->string('formato')->default(1);

	        $table->string('numero_to')->default(1);

	        $table->timestamps();
        });

	    DB::select("ALTER TABLE " . Ordenado::PREFIJO . Ordenado::ARTICULOS  . '_' . Ordenado::CAPITULOS .
		    " COMMENT = 'Tabla pivot para permitir que un artículo pertenezca a multiples textos ordenados'");
    }

    public function down()
    {
	    Schema::dropIfExists(Ordenado::PREFIJO . Ordenado::ARTICULOS  . '_' . Ordenado::CAPITULOS);
    }
}
