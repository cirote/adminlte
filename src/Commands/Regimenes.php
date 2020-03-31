<?php

namespace Mercosur\Regimenes\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Mercosur\Regimenes\Models\Regimenes\Notificacion;
use Mercosur\Regimenes\Models\Regimenes\Item;
use Mercosur\Regimenes\Models\Regimenes\Lista;
use Mercosur\Regimenes\Models\Regimenes\Observacion;
use Mercosur\Regimenes\Models\Regimenes\Regimen;


class Regimenes extends Command
{
	protected $signature = 'populate:regimenes';

	protected $description = 'Agrega datos a la base de Regimenes Especiales de importaciones';

	public function handle()
	{
		$this->titulos();

		$this->limpiar();

		$this->agregarDatos();

		$this->footer();
	}

	protected function titulos(): void
	{
		$this->info('');

		$this->info("Cargando tabla de Regimenes Especiales de Importacion");
		$this->info("-----------------------------------------------------");

		$this->info('');
	}

	public function limpiar(): void
	{
		$this->info('Limpiando las tablas de la base de datos');

		DB::statement('SET foreign_key_checks=0');

		Regimen::truncate();

		Notificacion::truncate();

		Lista::truncate();

		Item::truncate();

		Observacion::truncate();

		DB::statement('SET foreign_key_checks=1');
	}

	public function agregarDatos(): void
	{
        Regimen::create([
	        'id' 	 => 'LETEC',
	        'nombre' => [
			    'es' => 'Excepciones al Arancel Externo Común',
			    'pt' => 'Exceções à Tarifa Externa Comun'
		    ],
		    'paises' => ['ARG', 'BRA', 'PRY', 'URY'],
		    'composicion' => 'semestre',
		    'utilizacion' => 'trimestre'
        ]);

	    Regimen::create([
		    'id'  	 => 'BK',
		    'nombre' => [
			    'es' => 'Bienes de capital',
			    'pt' => 'Bens de capital'
		    ],
		    'paises' => ['ARG', 'BRA', 'PRY', 'URY'],
		    'composicion' => 'semestre',
		    'utilizacion' => 'trimestre'
		]);

	    Regimen::create([
		    'id' 	 => 'BIT',
		    'nombre' => [
			    'es' => 'Bienes de informática y telecomunicaciones',
			    'pt' => 'Bens de informática e telecomunicações'
		    ],
		    'paises' => ['ARG', 'BRA', 'PRY', 'URY'],
		    'composicion' => 'semestre',
		    'utilizacion' => 'trimestre'
	    ]);

	    Regimen::create([
		    'id'	 => 'IA',
		    'nombre' => [
			    'es' => 'Insumos agropecuarios',
			    'pt' => 'Insumos agropecuarios'
		    ],
		    'paises' => ['PRY', 'URY'],
		    'composicion' => null,
		    'utilizacion' => 'semestre'
	    ]);

	    Regimen::create([
		    'id'	 => 'MP',
		    'nombre' => [
			    'es' => 'Materias primas',
			    'pt' => 'Matérias primas'
		    ],
		    'paises' => ['PRY'],
		    'composicion' => 'semestre',
		    'utilizacion' => 'semestre'
	    ]);

	    Regimen::create([
		    'id'	 => 'IEL',
		    'nombre' => [
			    'es' => 'REI de Impacto económico limitado',
			    'pt' => 'REI de Impacto Econômico Limitado'
		    ],
		    'paises' => ['ARG', 'BRA', 'PRY', 'URY'],
		    'composicion' => null,
		    'utilizacion' => 'anual'
	    ]);
	}

	protected function footer(): void
	{
		$this->info('');
		$this->info("Terminado");
		$this->info('');
	}
}