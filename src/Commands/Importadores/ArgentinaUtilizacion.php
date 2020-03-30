<?php

namespace Mercosur\Regimenes\Commands\Importadores;

class ArgentinaUtilizacion extends ImportadorBase
{
	protected function cargarCodigo($celda): void
	{
		if ($codigo = $this->codigo($celda[$this->celdaCodigo()])) 
		{
			$item = $this->lista->items()->create([
				'codigo'  	=> $codigo,
				'arancel'   => $this->celdaArancelAplicado() ? $this->arancel($celda[$this->celdaArancelAplicado()]) : null,
				'importaciones_mercosur'  => $this->monto($celda[$this->celdaImportacionesMercosur()]),
				'importaciones_extrazona' => $this->monto($celda[$this->celdaImportacionesExtrazona()]),
				'exportaciones_mercosur'  => $this->celdaExportacionesMercosur() ? $this->monto($celda[$this->celdaExportacionesMercosur()]) : null,
				'exportaciones_extrazona' => $this->celdaExportacionesExtrazona() ? $this->monto($celda[$this->celdaExportacionesExtrazona()]) : null,
			]);
		}
	}
}