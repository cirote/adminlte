<?php

namespace Mercosur\Regimenes\Commands\Importadores;

use Illuminate\Support\Carbon;
use Mercosur\Regimenes\Models\Regimenes\Item;

class ParaguayMateriasPrimas extends ArgentinaVersion1a
{
	protected const CELDA_ARANCEL = null;

	protected function boot(): void
	{

	}

	protected function agregarObservaciones(Item $item, $celda): void
	{

	}

	protected function cargarCodigo($celda): void
	{
		$codigo = $this->codigo($celda[$this->celdaCodigo()]);

		if ($codigo) 
		{
			$item = $this->lista->items()->create([
				'codigo'  => $codigo,
				'arancel' => $this->celdaArancel() ? $this->arancel($celda[$this->celdaArancel()]) : null,
				'inclusion'    => Carbon::rawCreateFromFormat("d/m/Y", '01/01/2018'),
				'finalizacion' => Carbon::rawCreateFromFormat("d/m/Y", '31/08/2018')
			]);

			$this->agregarObservaciones($item, $celda);
		}
	}
}