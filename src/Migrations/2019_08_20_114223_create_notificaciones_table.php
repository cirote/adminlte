
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mercosur\Regimenes\Config\Regimenes;

class CreateNotificacionesTable extends Migration
{
    public function up()
    {
        Schema::create(Regimenes::PREFIJO . Regimenes::NOTIFICACIONES, function (Blueprint $table) {
            $table->increments('id');
	        $table->string('informante');
            $table->date('fecha');
            $table->string('nota')->nullable()->default(null);
            $table->json('asunto')->nullable()->default(null);
            $table->string('organo')->nullable()->default(null);
            $table->string('reunion')->nullable()->default(null);
            $table->string('link')->nullable()->default(null);
            $table->string('directorio');
            $table->string('descargar')->nullable()->default(null);
	        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(Regimenes::PREFIJO . Regimenes::NOTIFICACIONES);
    }
}
