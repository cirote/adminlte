<?php

namespace Mercosur\Ordenado\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Mercosur\Ordenado\Models\Analizador;
use Mercosur\Ordenado\Models\Articulo;
use Mercosur\Ordenado\Models\Capitulo;
use Mercosur\Ordenado\Models\Complemento;
use Mercosur\Ordenado\Models\Contenido;
use Mercosur\Ordenado\Models\Norma;
use Mercosur\Ordenado\Models\Normable;
use Mercosur\Ordenado\Models\Pivote;
use Mercosur\Ordenado\Models\Texto;
use Mercosur\Ordenado\Models\Tipo;
use Mercosur\Ordenado\Models\Referencia;
use Mercosur\Ordenado\Models\Version;
use Mercosur\Ordenado\Commands\Directivas;
use Mercosur\Ordenado\Commands\Resoluciones;
use Mercosur\Ordenado\Commands\Decisiones;
use Mercosur\Ordenado\Commands\Origen;
use Mercosur\Ordenado\Commands\Rei;
use Mercosur\Ordenado\Commands\Tipos;
use Mercosur\Ordenado\Commands\Normas;

class Populate extends Command
{
	use Directivas;

	use Resoluciones;

	use Decisiones;

	use Origen;

	use Rei;

	use Tipos;

	use Normas;

	protected $signature = 'populate:ordenado';

	protected $description = 'Agrega datos a la base de textos ordenados';

	private $directivas;

	private $resoluciones;

	private $decisiones;

	public function handle()
	{
		$this->titulos();

		$this->limpiar();

		$this->agregarTipos();

		$this->agregarNormas();

		$this->agregarOrigen();

		$this->agregarREI();

		$this->poblarNormas();

		$this->footer();
	}

	public function limpiar(): void
	{
		$this->info('Limpiando tablas anteriores');

		DB::statement('SET foreign_key_checks=0');

		Articulo::truncate();

		Capitulo::truncate();

		Complemento::truncate();

		Contenido::truncate();

		Norma::truncate();

		Pivote::truncate();

		Referencia::truncate();

		Texto::truncate();

		Tipo::truncate();

		Version::truncate();

		DB::statement('SET foreign_key_checks=1');
	}

	protected function titulos(): void
	{
		$this->info('');

		$this->info("Cargando información sobre textos ordenados");
		$this->info("-------------------------------------------");

		$this->info('');
	}

	protected function footer(): void
	{
		$this->info('');
		$this->info("Terminado");
		$this->info('');
	}

	protected function directorio_base()
	{
		return __DIR__ . '/../Datos/Normas/';
	}
}