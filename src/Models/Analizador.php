<?php

namespace Mercosur\Ordenado\Models;

class Analizador
{
	private CONST COMPLEMENTO = 'complemento';

	private CONST REFERENCIA = 'referencia';

	private CONST TEXTO = 'texto';

	private CONST FUENTE = 'fuente';

	private $file_name;

	private $file_data;

	private $referencias = [];

	private $complementos = [];

	private $fuente;

	public function __construct($file_name)
	{
		$this->file_name = $file_name;

		$this->analizar();
	}

	private function analizar()
	{
		$this->file_data = file_get_contents($this->file_name);

		$this->fuente = $this->extraer(static::FUENTE);

		while ($cadena = $this->extraer(static::COMPLEMENTO))
		{
			$norma = $this->extraer(static::REFERENCIA, $cadena);

			$texto = $this->extraer(static::TEXTO, $cadena);

			$this->complementos[] = [$norma, $texto];
		}

		while ($cadena = $this->extraer(static::REFERENCIA))
		{
			$this->referencias[] = $cadena;
		}
	}

	public function referencias()
	{
		return $this->referencias;
	}

	public function complementos()
	{
		return $this->complementos;
	}

	public function fuente()
	{
		return $this->fuente;
	}

	public function contenido()
	{
		return $this->file_data;
	}

	private function extraer($tag, $texto_base = null)
	{
		$texto = ($texto_base == null) ? $this->file_data : $texto_base;

		if ($this->posicionInicial($tag, $texto) === false)
		{
			return null;
		}

		$longitud = strlen($tag) + 2;

		$cadena = substr(
			$texto,
			$this->posicionInicial($tag, $texto) + $longitud,
			$this->posicionFinal($tag, $texto) - $this->posicionInicial($tag, $texto) - $longitud
		);

		if ($texto_base == null)
		{
			$this->file_data = str_replace(
				$this->abrirTag($tag) . $cadena . $this->cerrarTag($tag),
				'',
				$this->file_data
			);
		}

		return trim($cadena);
	}

	private function posicionInicial($tag, $texto_base = null)
	{
		return strpos(
			($texto_base == null) ? $this->file_data : $texto_base,
			$this->abrirTag($tag)
		);
	}

	private function posicionFinal($tag, $texto_base = null)
	{
		return strpos(
			($texto_base == null) ? $this->file_data : $texto_base,
			$this->cerrarTag($tag)
		);
	}

	private function abrirTag($tag)
	{
		return "<$tag>";
	}

	private function cerrarTag($tag)
	{
		return "</$tag>";
	}

}