<?php

namespace Mercosur\Ordenado\Commands;

use Illuminate\Support\Carbon;
use Mercosur\Ordenado\Models\Tipo;

trait Tipos
{
	public function agregarTipos(): void
	{
		$this->info('Agregando tipos de normas');

		$this->directivas = Tipo::create([
			'abreviatura' => 'DIR',
			'tipo' => [
				'es' => 'Directiva CCM',
				'pt' => 'Diretriz CCM'
			]
		]);

		$this->resoluciones = Tipo::create([
			'abreviatura' => 'RES',
			'tipo' => [
				'es' => 'Resolución GMC',
				'pt' => 'Resolução GMC'
			]
		]);

		$this->decisiones = Tipo::create([
			'abreviatura' => 'DEC',
			'tipo' => [
				'es' => 'Decisión CMC',
				'pt' => 'Decisão CMC'
			]
		]);
	}
}
