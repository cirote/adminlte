
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
            $table->string('nota');
            $table->json('asunto');
            $table->string('directorio');
            $table->string('descargar');
	        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(Regimenes::PREFIJO . Regimenes::NOTIFICACIONES);
    }
}
