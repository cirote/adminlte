<?php

namespace Mercosur\Regimenes\Commands\Importadores;

class UruguayUtilizacionAgropecuarios extends UruguayUtilizacion
{
	protected function cargarCodigo($celda): void
	{
		if ($codigo = $this->codigo($celda[$this->celdaCodigo()])) 
		{
			$item = $this->lista->items()->create([
				'codigo'  	=> $codigo,
				'importaciones_mercosur'  => $this->monto($celda[$this->celdaImportacionesMercosur()]),
				'importaciones_extrazona' => $this->monto($celda[$this->celdaImportacionesExtrazona()]) - $this->monto($celda[$this->celdaImportacionesMercosur()]),
			]);
		}
	}
}