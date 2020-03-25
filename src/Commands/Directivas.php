<?php

namespace Mercosur\Ordenado\Commands;

use Illuminate\Support\Carbon;

trait Directivas
{
	protected function agregarDirectivas(): void
	{
		$this->info('Agregando directivas ...');

		$this->directivas->normas()->create([
			'numero' => 17,
			'año' => 1999,
			'titulo' => [
				'es' => 'MECANISMO DE CONSULTAS EN LA COMISION DE COMERCIO DEL MERCOSUR',
				'pt' => 'MECANISMO DE CONSULTAS NA COMISSÃO DE COMÉRCIO DO MERCOSUL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/492',
				'pt' => 'https://normas.mercosur.int/public/normativas/492',
			],
			'aprobada_el' => Carbon::createFromDate(1999, 11, 15),
			'vigente_desde' => Carbon::createFromDate(1999, 11, 15),
		]);

		$this->directivas->normas()->create([
			'numero' => 4,
			'año' => 2010,
			'titulo' => [
				'es' => 'CERTIFICACIÓN DE ORIGEN DIGITAL',
				'pt' => 'CERTIFICAÇÃO DE ORIGEM DIGITAL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/1490',
				'pt' => 'https://normas.mercosur.int/public/normativas/1490',
			],
			'aprobada_el' => Carbon::createFromDate(2010, 3, 4),
			'vigente_desde' => Carbon::createFromDate(2015, 8, 21),
		]);

		$this->directivas->normas()->create([
			'numero' => 41,
			'año' => 2011,
			'titulo' => [
				'es' => 'CERTIFICACIÓN DE ORIGEN DIGITAL',
				'pt' => 'CERTIFICAÇÃO DE ORIGEM DIGITAL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/2530',
				'pt' => 'https://normas.mercosur.int/public/normativas/2530',
			],
			'aprobada_el' => Carbon::createFromDate(2011, 11, 30),
			'vigente_desde' => Carbon::createFromDate(2017, 12, 17),
		]);

		$this->directivas->normas()->create([
			'numero' => 33,
			'año' => 2014,
			'titulo' => [
				'es' => 'RÉGIMEN DE ORIGEN MERCOSUR',
				'pt' => 'REGIME DE ORIGEM MERCOSUL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/2975',
				'pt' => 'https://normas.mercosur.int/public/normativas/2975',
			],
			'aprobada_el' => Carbon::createFromDate(2014, 7, 25),
			'vigente_desde' => Carbon::createFromDate(2017, 12, 17),
		]);

		$this->directivas->normas()->create([
			'numero' => 32,
			'año' => 2017,
			'titulo' => [
				'es' => 'RÉGIMEN DE ORIGEN MERCOSUR',
				'pt' => 'REGIME DE ORIGEM MERCOSUL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/3387',
				'pt' => 'https://normas.mercosur.int/public/normativas/3387',
			],
			'aprobada_el' => Carbon::createFromDate(2017, 5, 24),
			'vigente_desde' => Carbon::createFromDate(2017, 5, 24),
		]);

		$this->directivas->normas()->create([
			'numero' => 39,
			'año' => 2018,
			'titulo' => [
				'es' => 'RÉGIMEN DE ORIGEN MERCOSUR',
				'pt' => 'REGIME DE ORIGEM MERCOSUL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/3574',
				'pt' => 'https://normas.mercosur.int/public/normativas/3574',
			],
			'aprobada_el' => Carbon::createFromDate(2018, 06, 06),
//			'vigente_desde' => Carbon::createFromDate(2015, 06, 27),
		]);

		$this->directivas->normas()->create([
			'numero' => 38,
			'año' => 2019,
			'titulo' => [
				'es' => 'MODIFICACIÓN DE LA DECISIÓN CMC Nº 01/09 “RÉGIMEN DE ORIGEN MERCOSUR”',
				'pt' => 'MODIFICAÇÃO DA DECISÃO CMC Nº 01/09 “REGIME DE ORIGEM MERCOSUL”'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/3772',
				'pt' => 'https://normas.mercosur.int/public/normativas/3772',
			],
			'aprobada_el' => Carbon::createFromDate(2019, 07, 14),
//			'vigente_desde' => Carbon::createFromDate(2015, 06, 27),
		]);

	}
}
