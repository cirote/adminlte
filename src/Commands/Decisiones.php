<?php

namespace Mercosur\Ordenado\Commands;

use Illuminate\Support\Carbon;

trait Decisiones
{
	protected function agregarDecisiones(): void
	{
		$this->info('Agregando decisiones ...');

		$this->decisiones->normas()->create([
			'numero' => 1,
			'año' => 2003,
			'titulo' => [
				'es' => 'CONDICIONES DE ACCESO EN EL COMERCIO BILATERAL ARGENTINA – URUGUAY PARA PRODUCTOS PROVENIENTES DEL ÁREA ADUANERA ESPECIAL DE TIERRA DEL FUEGO Y DE LA ZONA FRANCA DE COLONIA',
				'pt' => 'CONDIÇÕES DE ACESSO NO COMÉRCIO BILATERAL ARGENTINA-URUGUAI PARA PRODUTOS PROVENIENTES DA ÁREA ADUANEIRA ESPECIAL DA TERRA DO FOGO E DA ZONA FRANCA DE COLÔNIA'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/887',
				'pt' => 'https://normas.mercosur.int/public/normativas/887',
			],
			'aprobada_el' => Carbon::createFromDate(2003, 6, 18),
//			'vigente_desde' => Carbon::createFromDate(2004, 12, 29),
		]);

		$this->decisiones->normas()->create([
			'numero' => 17,
			'año' => 2003,
			'titulo' => [
				'es' => 'RÉGIMEN DE CERTIFICACIÓN DE MERCADERÍAS ORIGINARIAS DEL MERCOSUR ALMACENADAS EN DEPÓSITOS ADUANEROS DE UNO DE SUS ESTADOS PARTES',
				'pt' => 'REGIME DE CERTIFICAÇÃO DE MERCADORIAS ORIGINÁRIAS DO MERCOSUL ARMAZENADAS EM DEPÓSITOS ADUANEIROS DE UM DE SEUS ESTADOS PARTES'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/903',
				'pt' => 'https://normas.mercosur.int/public/normativas/903',
			],
			'aprobada_el' => Carbon::createFromDate(2003, 12, 16),
			'vigente_desde' => Carbon::createFromDate(2004, 12, 29),
		]);

		$this->decisiones->normas()->create([
			'numero' => 54,
			'año' => 2004,
			'titulo' => [
				'es' => 'ELIMINACIÓN DEL DOBLE COBRO DEL AEC Y DISTRIBUCIÓN DE LA RENTA ADUANERA',
				'pt' => 'ELIMINAÇÃO DA DUPLA COBRANÇA DA TEC E DISTRIBUIÇÃO DA RENDA ADUANEIRA'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/885',
				'pt' => 'https://normas.mercosur.int/public/normativas/885',
			],
			'aprobada_el' => Carbon::createFromDate(2004, 12, 16),
			'vigente_desde' => Carbon::createFromDate(2012, 5, 13),
		]);

		$this->decisiones->normas()->create([
			'numero' => 3,
			'año' => 2005,
			'titulo' => [
				'es' => 'RÉGIMEN PARA LA INTEGRACIÓN DE PROCESOS PRODUCTIVOS EN VARIOS ESTADOS PARTES DEL MERCOSUR CON UTILIZACIÓN DE MATERIALES NO ORIGINARIOS',
				'pt' => 'REGIME PARA A INTEGRAÇÃO DE PROCESSOS PRODUTIVOS EM VÁRIOS ESTADOS PARTES DO MERCOSUL COM UTILIZAÇÃO DE MATERIAIS NÃO ORIGINÁRIOS'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/699',
				'pt' => 'https://normas.mercosur.int/public/normativas/699',
			],
			'aprobada_el' => Carbon::createFromDate(2005, 6, 19),
//			'vigente_desde' => Carbon::createFromDate(2008, 12, 15),
		]);

		$this->decisiones->normas()->create([
			'numero' => 37,
			'año' => 2005,
			'titulo' => [
				'es' => 'REGLAMENTACIÓN DE LA DECISIÓN CMC Nº 54/04',
				'pt' => 'REGULAMENTAÇÃO DA DECISÃO CMC Nº 54/04'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/772',
				'pt' => 'https://normas.mercosur.int/public/normativas/772',
			],
			'aprobada_el' => Carbon::createFromDate(2005, 12, 8),
			'vigente_desde' => Carbon::createFromDate(2006, 6, 7),
		]);

		$this->decisiones->normas()->create([
			'numero' => 33,
			'año' => 2005,
			'titulo' => [
				'es' => 'REGÍMENES ESPECIALES DE IMPORTACIÓN',
				'pt' => 'REGIMES ESPECIAIS DE IMPORTAÇÃO'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/768',
				'pt' => 'https://normas.mercosur.int/public/normativas/768',
			],
			'aprobada_el' => Carbon::createFromDate(2005, 12, 8),
			'vigente_desde' => Carbon::createFromDate(2011, 10, 26),
		]);

		$this->decisiones->normas()->create([
			'numero' => 3,
			'año' => 2006,
			'titulo' => [
				'es' => 'REGÍMENES ESPECIALES DE IMPORTACIÓN',
				'pt' => 'REGIMES ESPECIAIS DE IMPORTAÇÃO'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/661',
				'pt' => 'https://normas.mercosur.int/public/normativas/661',
			],
			'aprobada_el' => Carbon::createFromDate(2006, 7, 21),
			'vigente_desde' => Carbon::createFromDate(2012, 7, 29),
		]);

		$this->decisiones->normas()->create([
			'numero' => 60,
			'año' => 2007,
			'titulo' => [
				'es' => 'CONDICIONES DE ACCESO EN EL COMERCIO BILATERAL BRASIL-URUGUAY PARA PRODUCTOS PROVENIENTES DE LA ZONA FRANCA DE MANAOS Y DE LAS ZONAS FRANCAS DE COLONIA Y NUEVA PALMIRA',
				'pt' => 'CONDIÇÕES DE ACESSO NO COMÉRCIO BILATERAL BRASIL-URUGUAI PARA PRODUTOS PROVENIENTES DA ZONA FRANCA DE MANAUS E DAS ZONAS FRANCAS DE COLÔNIA E NOVA PALMIRA'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/326',
				'pt' => 'https://normas.mercosur.int/public/normativas/326',
			],
			'aprobada_el' => Carbon::createFromDate(2007, 12, 17),
			'vigente_desde' => Carbon::createFromDate(2007, 12, 17),
		]);

		$this->decisiones->normas()->create([
			'numero' => 62,
			'año' => 2007,
			'titulo' => [
				'es' => 'RÉGIMEN DE CERTIFICACIÓN DE MERCADERÍAS ORIGINARIAS DE ISRAEL ALMACENADAS EN DEPÓSITOS ADUANEROS DE LOS ESTADOS PARTES DEL MERCOSUR',
				'pt' => 'REGIME DE CERTIFICAÇÃO DE MERCADORIAS ORIGINÁRIAS DE ISRAEL ARMAZENADAS EM DEPÓSITOS ADUANEIROS DOS ESTADOS PARTES DO MERCOSUL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/328',
				'pt' => 'https://normas.mercosur.int/public/normativas/328',
			],
			'aprobada_el' => Carbon::createFromDate(2007, 12, 17),
			'vigente_desde' => Carbon::createFromDate(2017, 12, 17),
		]);

		$this->decisiones->normas()->create([
			'numero' => 55,
			'año' => 2008,
			'titulo' => [
				'es' => 'RÉGIMEN DE CERTIFICACIÓN DE MERCADERÍAS ORIGINARIAS DE LA SACU ALMACENADAS EN DEPÓSITOS ADUANEROS DE LOS ESTADOS PARTES DEL MERCOSUR',
				'pt' => 'REGIME DE CERTIFICAÇÃO DE MERCADORIAS ORIGINÁRIAS DA SACU ARMAZENADAS EM DEPÓSITOS ADUANEIROS DOS ESTADOS PARTES DO MERCOSUL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/175',
				'pt' => 'https://normas.mercosur.int/public/normativas/175',
			],
			'aprobada_el' => Carbon::createFromDate(2008, 12, 15),
			'vigente_desde' => Carbon::createFromDate(2019, 11, 17),
		]);

		$this->decisiones->normas()->create([
			'numero' => 58,
			'año' => 2008,
			'titulo' => [
				'es' => 'BIENES DE CAPITAL Y BIENES DE INFORMÁTICA Y TELECOMUNICACIONES',
				'pt' => 'BENS DE CAPITAL E BENS DE INFORMÁTICA E TELECOMUNICAÇÕES'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/178',
				'pt' => 'https://normas.mercosur.int/public/normativas/178',
			],
			'aprobada_el' => Carbon::createFromDate(2008, 12, 15),
			'vigente_desde' => Carbon::createFromDate(2008, 12, 15),
		]);

		$this->decisiones->normas()->create([
			'numero' => 1,
			'año' => 2009,
			'titulo' => [
				'es' => 'RÉGIMEN DE ORIGEN MERCOSUR',
				'pt' => 'REGIME DE ORIGEM MERCOSUL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/610',
				'pt' => 'https://normas.mercosur.int/public/normativas/610',
			],
			'aprobada_el' => Carbon::createFromDate(2009, 7, 23),
			'vigente_desde' => Carbon::createFromDate(2015, 6, 27),
		]);

		$this->decisiones->normas()->create([
			'numero' => 58,
			'año' => 2010,
			'titulo' => [
				'es' => 'LISTAS NACIONALES DE EXCEPCIONES AL ARANCEL EXTERNO COMÚN',
				'pt' => 'LISTAS NACIONAIS DE EXCEÇÕES À TARIFA EXTERNA COMUM'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/2376',
				'pt' => 'https://normas.mercosur.int/public/normativas/2376',
			],
			'aprobada_el' => Carbon::createFromDate(2010, 12, 16),
			'vigente_desde' => Carbon::createFromDate(2014, 3, 14),
		]);

		$this->decisiones->normas()->create([
			'numero' => 24,
			'año' => 2015,
			'titulo' => [
				'es' => 'REGÍMENES ESPECIALES DE IMPORTACIÓN',
				'pt' => 'REGIMES ESPECIAIS DE IMPORTAÇÃO'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/3149',
				'pt' => 'https://normas.mercosur.int/public/normativas/3149',
			],
			'aprobada_el' => Carbon::createFromDate(2015, 7, 16),
			'vigente_desde' => Carbon::createFromDate(2018, 8, 1),
		]);

		$this->decisiones->normas()->create([
			'numero' => 25,
			'año' => 2015,
			'titulo' => [
				'es' => 'BIENES DE CAPITAL Y BIENES DE INFORMÁTICA Y TELECOMUNICACIONES',
				'pt' => 'BENS DE CAPITAL E BENS DE INFORMÁTICA E TELECOMUNICAÇÕES'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/3151',
				'pt' => 'https://normas.mercosur.int/public/normativas/3151',
			],
			'aprobada_el' => Carbon::createFromDate(2015, 7, 16),
			'vigente_desde' => Carbon::createFromDate(2017, 9, 4),
		]);

		$this->decisiones->normas()->create([
			'numero' => 26,
			'año' => 2015,
			'titulo' => [
				'es' => 'MODIFICACIÓN DE LA DECISIÓN CMC N° 58/10',
				'pt' => 'MODIFICAÇÃO DA DECISÃO CMC Nº 58/10'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/3159',
				'pt' => 'https://normas.mercosur.int/public/normativas/3159',
			],
			'aprobada_el' => Carbon::createFromDate(2015, 7, 16),
			'vigente_desde' => Carbon::createFromDate(2017, 9, 4),
		]);

		$this->decisiones->normas()->create([
			'numero' => 31,
			'año' => 2015,
			'titulo' => [
				'es' => 'RÉGIMEN DE ORIGEN MERCOSUR',
				'pt' => 'REGIME DE ORIGEM MERCOSUL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/3164',
				'pt' => 'https://normas.mercosur.int/public/normativas/3164',
			],
			'aprobada_el' => Carbon::createFromDate(2015, 7, 16),
			'vigente_desde' => Carbon::createFromDate(2018, 9, 19),
		]);

		$this->decisiones->normas()->create([
			'numero' => 32,
			'año' => 2015,
			'titulo' => [
				'es' => 'RÉGIMEN DE ORIGEN MERCOSUR',
				'pt' => 'REGIME DE ORIGEM MERCOSUL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/3165',
				'pt' => 'https://normas.mercosur.int/public/normativas/3165',
			],
			'aprobada_el' => Carbon::createFromDate(2015, 7, 16),
			'vigente_desde' => Carbon::createFromDate(2018, 9, 23),
		]);

		$this->decisiones->normas()->create([
			'numero' => 33,
			'año' => 2015,
			'titulo' => [
				'es' => 'ZONAS FRANCAS, ZONAS DE PROCESAMIENTO DE EXPORTACIONES Y ÁREAS ADUANERAS ESPECIALES',
				'pt' => 'ZONAS FRANCAS, ZONAS DE PROCESSAMENTO DE EXPORTAÇÕES E ÁREAS ADUANEIRAS ESPECIAIS'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/3166',
				'pt' => 'https://normas.mercosur.int/public/normativas/3166',
			],
			'aprobada_el' => Carbon::createFromDate(2015, 7, 16),
			'vigente_desde' => Carbon::createFromDate(2019, 7, 21),
		]);

		$this->decisiones->normas()->create([
			'numero' => 24,
			'año' => 2017,
			'titulo' => [
				'es' => 'RÉGIMEN COMÚN PARA LA IMPORTACIÓN DE BIENES DE INFORMÁTICA Y TELECOMUNICACIONES NO PRODUCIDOS EN EL MERCOSUR',
				'pt' => 'REGIME COMUM PARA A IMPORTAÇÃO DE BENS DE INFORMÁTICA TELECOMUNICAÇÕES NÃO PRODUZIDOS NO MERCOSUL'
			],
			'link' => [
				'es' => 'https://normas.mercosur.int/public/normativas/3471',
				'pt' => 'https://normas.mercosur.int/public/normativas/3471',
			],
			'aprobada_el' => Carbon::createFromDate(2017, 12, 20),
			'vigente_desde' => Carbon::createFromDate(2017, 12, 20),
		]);
	}
}
