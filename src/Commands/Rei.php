<?php

namespace Mercosur\Ordenado\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Mercosur\Ordenado\Models\Analizador;
use Mercosur\Ordenado\Models\Articulo;
use Mercosur\Ordenado\Models\Capitulo;
use Mercosur\Ordenado\Models\Complemento;
use Mercosur\Ordenado\Models\Contenido;
use Mercosur\Ordenado\Models\Norma;
use Mercosur\Ordenado\Models\Pivote;
use Mercosur\Ordenado\Models\Texto;
use Mercosur\Ordenado\Models\Tipo;
use Mercosur\Ordenado\Models\Referencia;
use Mercosur\Ordenado\Models\Version;

trait Rei
{
	protected function agregarREI(): void
	{
		$this->agregarRegimenesEspeciales(
			$this->crearREI()
		);
	}

	protected function crearREI(): Texto
	{
		$this->info('');

		$this->info("Creando Regimenes Especiales de Importación");

		return Texto::create([
			'referencia' => 'REI',
			'titulo' => [
				'es' => 'Regimenes Especiales de Importación',
				'pt' => 'Regimes Especiais de Importação'
			],
			'naturaleza' => [
				'es' => 'Texto Ordenado',
				'pt' => 'Texto Sintético'
			]
		]);
	}

	protected function agregarRegimenesEspeciales($regimen): void
	{
		$this->crearBK($regimen);

		$this->crearBIT($regimen);

		$this->crearDrawBack($regimen);

		$this->crearInsumosAgropecuarios($regimen);

		$this->crearMateriasPrimas($regimen);
		
		$this->crearExcepcionesAEC($regimen);

		$this->crearImpactoEconomicoLimitado($regimen);
	}

	protected function crearBK($regimen): void
	{
		$this->info('Agregando Régimen de Bienes de Capital ...');

		$normaBase = Norma::byDatos('Dec', 25, 2015);

		$capitulo = $regimen->capitulos()->create([
			'orden' => 100,
			'numero' => 'BK',
			'formato' => 2,
			'titulo' => [
				'es' => 'Bienes de Capital',
				'pt' => 'Bens de Capital'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 100,
			'numero_to' => 1,
			'numero' => 3,
			'titulo' => [
				'es' => 'Régimen transitorio general',
				'pt' => 'Regime transitório geral'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 200,
			'numero_to' => 2,
			'numero' => 4,
			'titulo' => [
				'es' => 'Régimen transitorio especial',
				'pt' => 'Regime transitório especial'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 300,
			'numero_to' => 3,
			'numero' => 2,
			'titulo' => [
				'es' => 'Datos estadísticos',
				'pt' => 'Dados estatísticos'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 400,
			'numero_to' => 4,
			'numero' => 10,
			'titulo' => [
				'es' => 'Transparencia',
				'pt' => 'Transparência'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 500,
			'numero_to' => 5,
			'numero' => 1,
			'titulo' => [
				'es' => 'Armonización',
				'pt' => 'Harmonização'
			]
		]);
	}

	protected function crearBIT($regimen): void
	{
		$this->info('Agregando Régimen de Bienes de Informática y Telecomunicaciones ...');

		$normaBase = Norma::byDatos('Dec', 25, 2015);

		$dec582008 = Norma::byDatos('Dec', 58, 2008);

		$dec242017 = Norma::byDatos('Dec', 24, 2017);

		$capitulo = $regimen->capitulos()->create([
			'orden' => 100,
			'numero' => 'BIT',
			'formato' => 2,
			'titulo' => [
				'es' => 'Bienes de Informática y Telecomunicaciones',
				'pt' => 'Bens de Informática e Telecomunicações'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'orden' => 100,
			'numero_to' => 1,
			'norma_id' => $normaBase->id,
			'numero' => 6,
			'titulo' => [
				'es' => 'Argentina y Brasil',
				'pt' => 'Argentina e Brasil'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'orden' => 200,
			'numero_to' => 2,
			'norma_id' => $normaBase->id,
			'numero' => 7,
			'titulo' => [
				'es' => 'Uruguay',
				'pt' => 'Uruguai'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'orden' => 300,
			'numero_to' => 3,
			'norma_id' => $normaBase->id,
			'numero' => 8,
			'titulo' => [
				'es' => 'Paraguay',
				'pt' => 'Paraguai'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'orden' => 400,
			'numero_to' => 4,
			'norma_id' => $normaBase->id,
			'numero' => 9,
			'titulo' => [
				'es' => 'Venezuela',
				'pt' => 'Venezuela'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'orden' => 500,
			'numero_to' => 5,
			'norma_id' => $dec582008->id,
			'numero' => 4,
			'titulo' => [
				'es' => 'Datos estadísticos',
				'pt' => 'Dados estatísticos'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'orden' => 600,
			'numero_to' => 6,
			'norma_id' => $normaBase->id,
			'numero' => 10,
			'titulo' => [
				'es' => 'Transparencia',
				'pt' => 'Transparência'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'orden' => 700,
			'numero_to' => 7,
			'norma_id' => $normaBase->id,
			'numero' => 5,
			'titulo' => [
				'es' => 'Armonización',
				'pt' => 'Harmonização'
			]
		]);
	}

	protected function crearDrawBack($regimen): void
	{
		$this->info('Agregando Régimen de Draw Back ...');

		$normaBase = Norma::byDatos('Dec', 24, 2015);

		$capitulo = $regimen->capitulos()->create([
			'orden' => 300,
			'numero' => 'DB',
			'formato' => 2,
			'titulo' => [
				'es' => 'Drawback y Admisión Temporaria',
				'pt' => 'Drawback e Admissão Temporária'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 100,
			'numero_to' => 1,
			'numero' => 1,
			'titulo' => [
				'es' => 'Régimen transitorio',
				'pt' => 'Regime transitório'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 200,
			'numero_to' => 2,
			'numero' => 2,
			'titulo' => [
				'es' => 'Armonización',
				'pt' => 'Harmonização'
			]
		]);
	}

	protected function crearInsumosAgropecuarios($regimen): void
	{
		$this->info('Agregando Régimen de Insumos Agropecuarios ...');

		$normaBase = Norma::byDatos('Dec', 24, 2015);

		$capitulo = $regimen->capitulos()->create([
			'orden' => 400,
			'numero' => 'IA',
			'formato' => 2,
			'titulo' => [
				'es' => 'Insumos Agropecuarios',
				'pt' => 'Insumos Agropecuários'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 100,
			'numero_to' => 1,
			'numero' => 3,
			'titulo' => [
				'es' => 'Régimen transitorio para Paraguay y Uruguay',
				'pt' => 'Regime transitório para Paraguai e Urugiai'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 200,
			'numero_to' => 2,
			'numero' => 5,
			'titulo' => [
				'es' => 'Datos estadísticos',
				'pt' => 'Dados estatísticos'
			]
		]);
	}

	protected function crearMateriasPrimas($regimen): void
	{
		$this->info('Agregando Régimen de Materias Primas ...');

		$normaBase = Norma::byDatos('Dec', 24, 2015);

		$capitulo = $regimen->capitulos()->create([
			'orden' => 500,
			'numero' => 'MP',
			'formato' => 2,
			'titulo' => [
				'es' => 'Materias Primas',
				'pt' => 'Matérias-primas'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 100,
			'numero_to' => 1,
			'numero' => 4,
			'titulo' => [
				'es' => 'Régimen de Materias Primas',
				'pt' => 'Regime de Matérias-primas'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 200,
			'numero_to' => 2,
			'numero' => 5,
			'titulo' => [
				'es' => 'Datos estadísticos',
				'pt' => 'Dados estatísticos'
			]
		]);
	}

	protected function crearExcepcionesAEC($regimen): void
	{
		$this->info('Agregando Régimen de Listas Nacionales de Excepción ...');

		$normaBase = Norma::byDatos('Dec', 58, 2010);

		$capitulo = $regimen->capitulos()->create([
			'orden' => 600,
			'numero' => 'LETEC',
			'formato' => 2,
			'titulo' => [
				'es' => 'Lista de Excepciones al AEC',
				'pt' => 'Lista de Exceções à TEC'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 100,
			'numero_to' => 1,
			'numero' => 1,
			'titulo' => [
				'es' => 'Plazo y número de ítems autorizados',
				'pt' => 'Prazo e número de itens autorizados'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 200,
			'numero_to' => 2,
			'numero' => 2,
			'titulo' => [
				'es' => 'Oferta Exportable',
				'pt' => 'Oferta exportável'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 300,
			'numero_to' => 3,
			'numero' => 3,
			'titulo' => [
				'es' => 'Modificación de las listas',
				'pt' => 'Modificação das listas'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 400,
			'numero_to' => 4,
			'numero' => 4,
			'titulo' => [
				'es' => 'Datos estadísticos',
				'pt' => 'Dados estatísticos'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 500,
			'numero_to' => 5,
			'numero' => 5,
			'titulo' => [
				'es' => 'Transparencia',
				'pt' => 'Transparência'
			]
		]);
	}

	protected function crearImpactoEconomicoLimitado($regimen): void
	{
		$this->info('Agregando Régimenes de Impacto Económico Limitado ...');

		$normaBase = Norma::byDatos('Dec', 3, 2006);

		$capitulo = $regimen->capitulos()->create([
			'orden' => 1000,
			'numero' => 'IEL',
			'formato' => 2,
			'titulo' => [
				'es' => 'Impacto económico limitado',
				'pt' => 'Impacto econômico limitado'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 100,
			'numero_to' => 1,
			'numero' => 1,
			'titulo' => [
				'es' => 'Ámbito de aplicación',
				'pt' => 'Âmbito de aplicação'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 200,
			'numero_to' => 2,
			'numero' => 2,
			'titulo' => [
				'es' => 'Incorporación de otros regímenes',
				'pt' => 'Incorporação de outros regimes'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 300,
			'numero_to' => 3,
			'numero' => 3,
			'titulo' => [
				'es' => 'Modificación de los regímenes',
				'pt' => 'Modificação dos regimes'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 400,
			'numero_to' => 4,
			'numero' => 4,
			'titulo' => [
				'es' => 'Nuevos regímenes',
				'pt' => 'Novos regimes'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 500,
			'numero_to' => 5,
			'numero' => 5,
			'titulo' => [
				'es' => 'Actualización de Anexos',
				'pt' => 'Atualização de anexos'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 600,
			'numero_to' => 6,
			'numero' => 6,
			'titulo' => [
				'es' => 'Datos estadísticos',
				'pt' => 'Dados estatísticos'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 2,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 700,
			'numero_to' => 7,
			'numero' => 7,
			'titulo' => [
				'es' => 'Regímenes Comunes',
				'pt' => 'Regimes Comuns'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 4,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 1100,
			'numero_to' => 11,
			'numero' => 101,
			'titulo' => [
				'es' => 'Argentina',
				'pt' => 'Argentina'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 4,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 1200,
			'numero_to' => 12,
			'numero' => 201,
			'titulo' => [
				'es' => 'Brasil',
				'pt' => 'Brasil'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 4,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 1300,
			'numero_to' => 13,
			'numero' => 301,
			'titulo' => [
				'es' => 'Paraguay',
				'pt' => 'Paraguai'
			]
		]);

		$capitulo->crearArticulo([
			'formato' => 4,
			'texto_id' => $regimen->id,
			'norma_id' => $normaBase->id,
			'orden' => 1400,
			'numero_to' => 14,
			'numero' => 401,
			'titulo' => [
				'es' => 'Uruguay',
				'pt' => 'Uruguai'
			]
		]);
	}
}
