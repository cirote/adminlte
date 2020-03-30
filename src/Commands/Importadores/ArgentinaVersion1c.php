<?php

namespace Mercosur\Regimenes\Commands\Importadores;

use Mercosur\Regimenes\Models\Regimenes\Item;

class ArgentinaVersion1c extends ArgentinaVersion1b
{
	protected function boot(): void
	{

	}

	protected function agregarObservaciones(Item $item, $celda): void
	{
		$observacion = trim($celda[$this->celdaObservaciones()]);

		if (strlen($observacion)) 
		{
			$item->observaciones()->create([
				'observacion' => $observacion
			]);
		}
	}
}