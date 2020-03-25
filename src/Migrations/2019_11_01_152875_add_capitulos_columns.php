<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Ordenado\Config\Ordenado;

class AddCapitulosColumns extends Migration
{
    public function up()
    {
        Schema::table(Ordenado::PREFIJO . Ordenado::CAPITULOS, function (Blueprint $table)
        {
	        $table->string('formato')->default('1')->after('numero');

	        $table->boolean('publicar')->default(true)->after('numero');
        });
    }

    public function down()
    {
	    Schema::table(Ordenado::PREFIJO . Ordenado::CAPITULOS, function (Blueprint $table)
	    {
		    $table->dropColumn('publicar');

		    $table->dropColumn('formato');
	    });
    }
}
