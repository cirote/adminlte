<?php

namespace Mercosur\Regimenes\Commands\Importadores;

class UruguayUtilizacionAgropecuarios extends UruguayUtilizacion
{
	protected const CELDA_IMPORTACIONES_MERCOSUR = 'D';

	protected const CELDA_IMPORTACIONES_EXTRAZONA = 'C';

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