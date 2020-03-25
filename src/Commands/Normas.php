<?php

namespace Mercosur\Ordenado\Commands;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Mercosur\Ordenado\Models\Analizador;
use Mercosur\Ordenado\Models\Norma;

trait Normas
{
	protected function agregarNormas(): void
	{
		$this->info('');
		$this->info('Agregando normas');

		$this->agregarDirectivas();

		$this->agregarResoluciones();

		$this->agregarDecisiones();
	}

	protected function poblarNormas(): void
	{
		foreach (Norma::all() as $norma)
		{
			$this->poblarNorma($norma);
		}
	}

	protected function poblarNorma(Norma $norma): void
	{
		foreach ($this->getArchivos($this->directorioNorma($norma)) as $archivo)
		{
			$this->procesarDirectorio($norma, $archivo);
		}
	}

	protected function procesarDirectorio(Norma $norma, $prefijo)
	{
		$directorioTrabajo = $this->directorioNorma($norma) . '/' . $prefijo . '/';

		foreach ($this->getArchivos($directorioTrabajo) as $archivo)
		{
			$datosArchivo = $this->getInfo($archivo, $norma);

			$articulo = $norma->articulos()->where('numero', $datosArchivo->numero)->first();

			if (!$articulo)
			{
				$articulo = $norma->articulos()->create([
					'numero' => $datosArchivo->numero,
					'titulo' => [
						'es' => 'Titulo',
						'pt' => 'Titulo'
					],
				]);
			}

			$version = $articulo->versiones()->firstOrCreate([
				'norma_id' => $datosArchivo->norma->id,
				'numero_en_la_norma' => $datosArchivo->articulo,
				'original' => $datosArchivo->original
			]);

			$analizador = new Analizador($directorioTrabajo . $archivo);

			$version->setTranslation('texto_fuente', $prefijo, $analizador->fuente())->save();

			foreach ($analizador->referencias() as $referencia)
			{
				list($tipo, $numero, $año) = explode(' ', $referencia);

				$version->crearReferencia(Norma::byDatos($tipo, $numero, $año));
			}

			foreach ($analizador->complementos() as $complemento)
			{
				list($tipo, $numero, $año) = explode(' ', $complemento[0]);

				$version->crearComplemento(Norma::byDatos($tipo, $numero, $año))
					->contenidos()->create([
						'locale' => $prefijo,
						'contenido' => $complemento[1]
					]);
			}

			$version->contenidos()->create([
				'locale' => $prefijo,
				'contenido' => $analizador->contenido()
			]);

			unset($analizador);
		}
	}

	protected function getInfo($archivo, Norma $norma)
	{
		list($nombre, $extension) = explode('.', $archivo);

		$datos = explode('_', $nombre);

		$cantidad = count($datos);

		$o = new \stdClass();

		$o->numero = $datos[0];

		if ($cantidad == 1)
		{
			$o->norma = $norma;

			$o->articulo = $o->numero;

			$o->original = true;

			return $o;
		}

		if ($cantidad == 5)
		{
			$o->norma = Norma::byDatos($datos[1], $datos[2], $datos[3]);

			$o->articulo = $datos[4];

			$o->original = false;

			return $o;
		}

		throw new \Exception("El archivo [$archivo] tiene el nombre formateado de manera incorrecta");
	}

	protected function getArchivos($directorio)
	{
		if (!file_exists($directorio))
		{
			return [];
		}

		$archivos = [];

		$dir = opendir($directorio);

		while ($archivo = readdir($dir))
		{
			if (!is_dir($archivo))
			{
				$archivos[] = $archivo;
			}
		}

		return $archivos;
	}

	protected function nombreNorma(Norma $norma)
	{
		return Str::ucfirst(strtolower($norma->tipo->abreviatura)) . '_' . $norma->numero . '_' . $norma->año;
	}

	protected function directorioNorma(Norma $norma)
	{
		return $this->directorio_base() . $this->nombreNorma($norma) . '/';
	}
}
