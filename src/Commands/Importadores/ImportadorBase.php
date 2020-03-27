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
	protected $lista;

	protected $archivo;

	protected $datos;

	public function __construct(Lista $lista)
	{
		$this->lista = $lista;

		$this->archivo = $lista->notificacion->directorio . '/' . $lista->archivo;

		$this->datos = Excell::toArray($this->archivo);

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

		if (strlen($v) != 8)
		{
			// dump("Numero de caracteres incorrectos en [$valor]");

			return null;
		}

		return $v;
	}

	protected function arancel($valor): float
	{
		$v = trim($valor);

		if (!strlen($v))
		{
			dump("Arancel en blanco en [$valor]");
		}

		$v = (float) $v;

		if ($v < 0 or $v > 50)
		{
			dump("Arancel fuera de rango en [$valor]");
		}

		return $v;
	}
}