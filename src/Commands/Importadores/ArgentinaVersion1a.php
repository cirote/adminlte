<?php

namespace Mercosur\Regimenes\Commands\Importadores;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Mercosur\Regimenes\Config\Regimenes;
use Mercosur\Regimenes\Models\Regimenes\Item;
use Mercosur\Regimenes\Models\Regimenes\Notificacion;
use Mercosur\Regimenes\Models\Regimenes\Lista;
use Mercosur\Regimenes\Models\Regimenes\Regimen;
use Mercosur\Helpers\Facades\Excell;

class ArgentinaVersion1a extends ImportadorBase
{
	protected const CELDA_CODIGO = 'A';

	protected const CELDA_ARANCEL = 'C';

	protected const CELDA_OBSERVACIONES = 'B';

	protected function boot(): void
	{
		$this->cargarObservaciones();
	}

	private $observaciones;

	private function cargarObservaciones(): void
	{
		$this->observaciones = [];

		$patron = "/\A\([0-9]{1,2}\)\s/i";

		foreach ($this->datos as $dato) 
		{
			$celda = $dato['A'];

			if (preg_match($patron, $celda, $ocurrencias)) 
			{
				$codigo = (int) trim(trim($ocurrencias[0]), '()');

				if ($codigo > 100 OR $codigo < 0) 
				{
					dump("Codigo incorrecto en [$celda]");
				}

				$texto = trim(preg_replace($patron, '', $celda));

				$this->observaciones[$codigo] = $texto;
			}
		}
	}

	protected function cargarCodigo($celda): void
	{
		$codigo = $this->codigo($celda[$this->celdaCodigo()]);

		if ($codigo) 
		{
			$item = $this->lista->items()->create([
				'codigo'  => $codigo,
				'arancel' => $this->celdaArancel() ? $this->arancel($celda[$this->celdaArancel()]) : null
			]);

			$this->agregarObservaciones($item, $celda);
		}
	}

	protected function agregarObservaciones(Item $item, $celda): void
	{
		$patron = "/\([0-9]{1,2}\)/i";

		foreach (explode(' ', $celda[$this->celdaObservaciones()]) as $obs) 
		{
			if (preg_match($patron, $obs, $ocurrencias)) 
			{
				$c = (int) trim(trim($ocurrencias[0]), '()');

				if ($c)
				{
					$item->observaciones()->create([
						'observacion' => $this->observaciones[$c]
					]);
				}
			}
		}
	}
}
