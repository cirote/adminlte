<?php

namespace Mercosur\Regimenes\Commands\Importadores;

use Mercosur\Regimenes\Models\Regimenes\Item;

class ArgentinaVersion1c extends ArgentinaVersion1b
{
	protected function agregarObservaciones(Item $item, $celda): void
	{
		$observacion = trim($celda[static::CELDA_OBSERVACIONES]);

		if (strlen($observacion)) 
		{
			$item->observaciones()->create([
				'observacion' => $observacion
			]);
		}
	}
}