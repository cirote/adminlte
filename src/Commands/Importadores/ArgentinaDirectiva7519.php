<?php

namespace Mercosur\Regimenes\Commands\Importadores;

use Mercosur\Regimenes\Models\Regimenes\Item;

class ArgentinaDirectiva7519 extends ArgentinaVersion1c
{
	protected const CELDA_OBSERVACIONES = 'D';

	protected function agregarObservaciones(Item $item, $celda): void
	{
		$observaciones = trim($celda[$this->celdaObservaciones()]);

		if (strlen($observaciones)) 
		{
			$observaciones = explode(PHP_EOL, $observaciones);

			foreach ($observaciones as $observacion) 
			{
				$observacion = trim($observacion);

				if (strlen($observacion)) 
				{
					$item->observaciones()->create([
						'observacion' => $observacion
					]);
				}
			}
		}
	}

}
