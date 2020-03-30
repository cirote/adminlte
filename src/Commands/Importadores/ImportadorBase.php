<?php

namespace Mercosur\Regimenes\Commands\Importadores;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Mercosur\Regimenes\Config\Regimenes;
use Mercosur\Regimenes\Models\Regimenes\Notificacion;
use Mercosur\Regimenes\Models\Regimenes\Lista;
use Mercosur\Regimenes\Models\Regimenes\Regimen;
use Mercosur\Helpers\Facades\Excell;

abstract class ImportadorBase
{
	protected const CELDA_CODIGO = 'A';

	protected const CELDA_ARANCEL = 'C';

	protected const CELDA_ARANCEL_APLICADO = null;

	protected const CELDA_OBSERVACIONES = 'B';

	protected const CELDA_IMPORTACIONES_MERCOSUR = 'C';

	protected const CELDA_IMPORTACIONES_EXTRAZONA = 'B';

	protected const CELDA_EXPORTACIONES_MERCOSUR = null;

	protected const CELDA_EXPORTACIONES_EXTRAZONA = null;

	protected $lista;

	protected $archivo;

	protected $hoja;

	protected $datos;

	public function __construct(Lista $lista)
	{
		$this->lista = $lista;

		$this->archivo = $lista->notificacion->directorio . '/' . $lista->archivo;

		$this->hoja = $lista->hoja ?? null;

		$this->datos = Excell::toArray($this->archivo, $this->hoja);

		$this->boot();

		$this->cargarCodigos();
	}

	protected function boot(): void
	{

	}

	protected function cargarCodigos(): void
	{
		foreach ($this->datos as $dato) 
		{
			$this->cargarCodigo($dato);
		}
	}

	protected function cargarCodigo($celda): void
	{

	}

	protected function codigo($valor): ?string
	{
		$v = trim($valor);

		$v = str_replace('.', '', $v);

		if (strlen($v) == 7)
		{
			$v = '0' . $v;
		}

		$patron = "/[0-9]{8}/i";

		if (preg_match($patron, $v, $ocurrencias)) 
		{
			return $v;
		}

		return null;
	}

	protected function arancel($valor): ?float
	{
		$v = trim($valor);

		if (!strlen($v))
		{
			dump("Arancel en blanco en [$valor]");

			return null;
		}

		$v = (float) $v;

		if ($v < 0 or $v > 60)
		{
			dump("Arancel fuera de rango en [$valor]");
		}

		return $v;
	}

	protected function monto($valor): float
	{
		$v = trim($valor);

		$v = (float) $v;

		if ($v < 0)
		{
			dump("Monto negativo [$valor]");
		}

		return $v;
	}

	protected function celdaCodigo()
	{
		return $this->lista->codigo ?? static::CELDA_CODIGO;
	}

	protected function celdaArancel()
	{
		return $this->lista->arancel ?? static::CELDA_ARANCEL;
	}

	protected function celdaArancelAplicado()
	{
		return $this->lista->arancel_aplicado ?? static::CELDA_ARANCEL_APLICADO;
	}

	protected function celdaObservaciones()
	{
		return $this->lista->observaciones ?? static::CELDA_OBSERVACIONES;
	}

	protected function celdaImportacionesMercosur()
	{
		return $this->lista->importaciones_mercosur ?? static::CELDA_IMPORTACIONES_MERCOSUR;
	}

	protected function celdaImportacionesExtrazona()
	{
		return $this->lista->importaciones_extrazona ?? static::CELDA_IMPORTACIONES_EXTRAZONA;
	}

	protected function celdaExportacionesMercosur()
	{
		return $this->lista->exportaciones_mercosur ?? static::CELDA_EXPORTACIONES_MERCOSUR;
	}

	protected function celdaExportacionesExtrazona()
	{
		return $this->lista->exportaciones_extrazona ?? static::CELDA_EXPORTACIONES_EXTRAZONA;
	}
}