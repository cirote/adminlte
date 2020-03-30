<?php

namespace Mercosur\Regimenes\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
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
		$this->info('Limpiando la tabla anterior');

		DB::statement('SET foreign_key_checks=0');

		Regimen::truncate();

		DB::statement('SET foreign_key_checks=1');
	}

	public function agregarDatos(): void
	{
        Regimen::create([
	        'abreviatura' => 'LETEC',
	        'nombre' => [
			    'es' => 'Excepciones al Arancel Externo Comun',
			    'pt' => 'Listas nacionais de exceções à TEC'
		    ]
        ]);

	    Regimen::create([
		    'abreviatura' => 'BK',
		    'nombre' => [
			    'es' => 'Bienes de capital',
			    'pt' => 'Listas nacionais de bens de capital'
		    ]
		]);

	    Regimen::create([
		    'abreviatura' => 'BIT',
		    'nombre' => [
			    'es' => 'Bienes de informática y telecomunicaciones',
			    'pt' => 'Listas nacionais de produtos de informática e telecomunicações'
		    ]
	    ]);

	    Regimen::create([
		    'abreviatura' => 'IA',
		    'nombre' => [
			    'es' => 'Insumos agropecuarios',
			    'pt' => 'Listas nacionais de produtos de informática e telecomunicações'
		    ]
	    ]);
	}

	protected function footer(): void
	{
		$this->info('');
		$this->info("Terminado");
		$this->info('');
	}
}