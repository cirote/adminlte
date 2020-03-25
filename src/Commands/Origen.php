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

trait Origen
{
	protected function agregarOrigen(): void
	{
		$this->agregarApendicesOrigen(
			$this->agregarCapitulosOrigen(
				$this->crearOrigen()
			)
		);
	}

	protected function crearOrigen(): Texto
	{
		$this->info('');

		$this->info('Creando el Régimen de Origen del MERCOSUR');

		return Texto::create([
			'referencia' => 'ROM',
			'titulo' => [
				'es' => 'Régimen de Origen del MERCOSUR',
				'pt' => 'Regime de Origem do MERCOSUL'
			],
			'naturaleza' => [
				'es' => 'Texto Ordenado',
				'pt' => 'Texto Organizado'
			]
		]);
	}

	protected function agregarCapitulosOrigen($origen)
	{
		$this->info("Agregando capitulos ...");

		$normaBase = Norma::byDatos('Dec', 1, 2009);

		$titulos = $this->titulosOrigen();

		$orden = 1;

		foreach ($this->capitulosOrigen() as $capitulo)
		{
			$cap = $origen->capitulos()->create([
				'orden' => 100 * $orden++,
				'numero' => $capitulo[0],
				'titulo' => [
					'es' => $capitulo[1],
					'pt' => $capitulo[2]
				]
			]);

			$articulo_inicial = $capitulo[3] ?? 0;

			$articulo_final = $capitulo[4] ?? $articulo_inicial;

			if ($articulo_inicial)
			{
				for ($numero_articulo = $articulo_inicial; $numero_articulo <= $articulo_final; $numero_articulo++)
				{
					if (isset($titulos[$numero_articulo]))
					{
						$tit_es = $titulos[$numero_articulo][0];
						$tit_pt = $titulos[$numero_articulo][1];
					}
					else
					{
						$tit_es = "Titulo del artículo $numero_articulo";
						$tit_pt = "Titulo do artigo $numero_articulo";
					}

					$cap->crearArticulo([
						'texto_id' => $origen->id,
						'norma_id' => $normaBase->id,
						'orden' => 100 * $numero_articulo,
						'numero' => $numero_articulo,
						'numero_to' => $numero_articulo,
						'titulo' => [
							'es' => $tit_es,
							'pt' => $tit_pt
						]
					]);
				}
			}
		}

		return $origen;
	}

	protected function agregarApendicesOrigen($origen): void
	{
		$this->info("Agregando apéndices ...");

		$this->agregarApendicesOrigenI($origen, $norma = Norma::byDatos('Dec', 1, 2009));
		$this->agregarApendicesOrigenII($origen, $norma);
		$this->agregarApendicesOrigenIII($origen, $norma);
		$this->agregarApendicesOrigenIV($origen, $norma);
		$this->agregarApendicesOrigenV($origen, $norma);
		$this->agregarApendicesOrigenVI($origen, $norma);
		$this->agregarApendicesOrigenVII($origen, $norma);
	}

	private function agregarApendicesOrigenI($origen, $normaBase): void
	{
		$cap = $origen->capitulos()->create([
			'orden' => 1000,
			'numero' => 'I',
			'formato' => 3,
			'titulo' => [
				'es' => 'Listado de ítem sujetos a requisitos específicos de origem',
				'pt' => 'Lista de itens NCM SH-2007 sujeitos a requisitos especificos de origem'
			]
		]);

		$cap->crearArticulo([
			'texto_id' => $origen->id,
			'norma_id' => $normaBase->id,
			'orden' => 1001,
			'numero' => 1001,
			'numero_to' => '',
			'formato' => 3,
			'titulo' => [
				'es' => 'LISTADO DE ITEM NCM SA 2012 SUJETOS A REQUISITOS ESPECIFICOS DE ORIGEN ',
				'pt' => 'LISTA DE ITENS NCM SA 2012 SUJETOS A REQUISITOS ESPECIFICOS DE ORIGEM '
			]
		]);
	}

	private function agregarApendicesOrigenII($origen, $normaBase): void
	{
		$cap = $origen->capitulos()->create([
			'orden' => 2000,
			'numero' => 'II',
			'formato' => 3,
			'titulo' => [
				'es' => 'Certificado de Origen del MERCOSUR',
				'pt' => 'Certificado de Origen do MERCOSUL'
			]
		]);

		$cap->crearArticulo([
			'texto_id' => $origen->id,
			'norma_id' => $normaBase->id,
			'orden' => 2001,
			'numero' => 2001,
			'numero_to' => '',
			'formato' => 3,
			'titulo' => [
				'es' => 'CERTIFICADO DE ORIGEN DEL MERCOSUR',
				'pt' => 'CERTIFICADO DE ORIGEM DO MERCOSUL'
			]
		]);

		$cap->crearArticulo([
			'texto_id' => $origen->id,
			'norma_id' => $normaBase->id,
			'orden' => 2002,
			'numero' => 2002,
			'numero_to' => '',
			'formato' => 3,
			'titulo' => [
				'es' => 'NOTAS',
				'pt' => 'NOTAS'
			]
		]);
	}

	private function agregarApendicesOrigenIII($origen, $normaBase): void
	{
		$cap = $origen->capitulos()->create([
			'orden' => 3000,
			'numero' => 'III',
			'formato' => 3,
			'titulo' => [
				'es' => 'Instructivo para las entidades habilitadas para la emisión de Certificados de Origen',
				'pt' => 'Instruções para as entidades autorizadas a emitir Certificados de Origem'
			]
		]);

		$cap->crearArticulo([
			'texto_id' => $origen->id,
			'norma_id' => $normaBase->id,
			'orden' => 3001,
			'numero' => 3001,
			'numero_to' => 'A',
			'formato' => 3,
			'titulo' => [
				'es' => 'CERTIFICADOS DE ORIGEN',
				'pt' => 'CERTIFICADOS DE ORIGEM'
			]
		]);

		$cap->crearArticulo([
			'texto_id' => $origen->id,
			'norma_id' => $normaBase->id,
			'orden' => 3002,
			'numero' => 3002,
			'numero_to' => 'B',
			'formato' => 3,
			'titulo' => [
				'es' => 'REQUISITOS DE ORIGEN',
				'pt' => 'REQUISITOS DE ORIGEM'
			]
		]);

		$cap->crearArticulo([
			'texto_id' => $origen->id,
			'norma_id' => $normaBase->id,
			'orden' => 3003,
			'numero' => 3003,
			'numero_to' => 'C',
			'formato' => 3,
			'titulo' => [
				'es' => 'REPARTICIONES OFICIALES DE LOS ESTADOS PARTES',
				'pt' => 'REPARTIÇÕES OFICIAIS DOS ESTADOS PARTES'
			]
		]);
	}

	private function agregarApendicesOrigenIV($origen, $normaBase): void
	{
		$cap = $origen->capitulos()->create([
			'orden' => 4000,
			'numero' => 'IV',
			'formato' => 3,
			'titulo' => [
				'es' => 'Instructivo para el control de Certificados de Origen del MERCOSUR por parte de las administraciones aduaneras',
				'pt' => 'Instruções para o controle de certificados de origem do MERCOSUL por parte das administrações aduaneiras'
			]
		]);

		$cap->crearArticulo([
			'texto_id' => $origen->id,
			'norma_id' => $normaBase->id,
			'orden' => 4001,
			'numero' => 4001,
			'numero_to' => 'A',
			'formato' => 3,
			'titulo' => [
				'es' => 'CONTROL DEL CERTIFICADO DE ORIGEN',
				'pt' => 'CONTROLE DO CERTIFICADO DE ORIGEM'
			]
		]);
	}

	private function agregarApendicesOrigenV($origen, $normaBase): void
	{
		$cap = $origen->capitulos()->create([
			'orden' => 5000,
			'numero' => 'V',
			'formato' => 3,
			'titulo' => [
				'es' => 'Autoridades competentes para la aplicación del Capítulo VII',
				'pt' => 'Autoridades competentes para a aplicação do capítulo VII'
			]
		]);

		$cap->crearArticulo([
			'texto_id' => $origen->id,
			'norma_id' => $normaBase->id,
			'orden' => 5001,
			'numero' => 5001,
			'numero_to' => '',
			'formato' => 3,
			'titulo' => [
				'es' => 'AUTORIDADES COMPETENTES PARA LA APLICACIÓN DEL CAPÍTULO VII',
				'pt' => 'AUTORIDADES COMPETENTES PARA A APLICAÇÃO DO CAPÍTULO VII'
			]
		]);
	}

	private function agregarApendicesOrigenVI($origen, $normaBase): void
	{
		$cap = $origen->capitulos()->create([
			'orden' => 6000,
			'numero' => 'VI',
			'formato' => 3,
			'titulo' => [
				'es' => 'Formulario para solicitar modificaciones de los requisitos de origen en el MERCOSUR',
				'pt' => 'Formulário para solicitar modificações dos requisitos de origem no MERCOSUL'
			]
		]);

		$cap->crearArticulo([
			'texto_id' => $origen->id,
			'norma_id' => $normaBase->id,
			'orden' => 6001,
			'numero' => 6001,
			'numero_to' => '',
			'formato' => 3,
			'titulo' => [
				'es' => 'FORMULARIO PARA SOLICITAR MODIFICACIONES DE LOS REQUISITOS DE ORIGEN EN EL MERCOSUR',
				'pt' => 'FORMULÁRIO PARA SOLICITAR MODIFICAÇÕES DOS REQUISITOS DE ORIGEM NO MERCOSUL'
			]
		]);
	}

	private function agregarApendicesOrigenVII($origen, $normaBase): void
	{
		$cap = $origen->capitulos()->create([
			'orden' => 7000,
			'numero' => 'VII',
			'formato' => 3,
			'titulo' => [
				'es' => 'Declaración de utilización de materiales',
				'pt' => 'Declaração de utilização de materiais'
			]
		]);

		$cap->crearArticulo([
			'texto_id' => $origen->id,
			'norma_id' => $normaBase->id,
			'orden' => 7001,
			'numero' => 7001,
			'numero_to' => '',
			'formato' => 3,
			'titulo' => [
				'es' => 'DECLARACIÓN DE UTILIZACIÓN DE MATERIALES',
				'pt' => 'DECLARAÇÃO DE UTILIZAÇÃO DE MATERIAIS'
			]
		]);
	}

	protected function capitulosOrigen(): array
	{
		return [
			['I', 'Definiciones', 'Definições', 1],
			['II', 'Ámbito de aplicación', 'Âmbito de aplicação', 2],
			['III', 'Requisitos de origen', 'Requisitos de origem', 3, 14],
			['IV', 'Entidades certificantes', 'Entidades certificadoras', 15, 17],
			['V', 'Declaración y certificación', 'Declaração e certificação', 18, 21],
			['VI', 'Circulación Intra-MERCOSUR', 'Circulação Intra-MERCOSUL', 22, 24],
			['VII', 'Verificación y control', 'Verificação e controle', 25, 51],
			['VIII', 'Sanciones', 'Sanções', 52, 54],
			['IX', 'Disposiciones generales', 'Disposições gerais', 55],
			['X', 'Disposiciones finales', 'Disposições finais', 56],
		];
	}

	protected function titulosOrigen(): array
	{
		return [
			1 => ['Definición', 'Definição'],
			2 => ['Vigencia', 'Validade'],
			3 => ['Productos originarios', 'Produtos originários'],
			4 => ['Productos importados desde terceros países', 'Produtos importados de terceiros países'],
			5 => ['Tratamiento diferencial', 'Tratamento diferenciado'],
			6 => ['Calculo valor agregado regional', 'Cálculo valor agregado regional'],
			7 => ['Operaciones que no confieren origen', 'Operações que não conferem origem'],
			8 => ['Revisión de Requisito Específico de Origen', 'Revisão do Requisito Específico de Origem'],
			9 => ['Elementos para determinación de un REO', 'Elementos para determinação do REO'],
			10 => ['Acumulación de Origen', 'Acumulação de Origem'],
			11 => ['Acumulación Total de Origen', 'Acumulação total de origem'],
			12 => ['Integración de Procesos Productivos', 'Integração de processos produtivos'],
			13 => ['Definición de materiales', 'Definição de Materiais'],
			14 => ['Expedición directa', 'Envio direto'],
			15 => ['Emisión de Certificados de Origen', 'Emissão de Certificados de Origem'],
			16 => ['Requisitos de las entidades', 'Requisitos das entidades'],
			17 => ['Comunicación de entidades habilitadas', 'Comunicação das entidades habilitadas'],
			18 => ['Certificado de Origen', 'Certificado de origem'],
			19 => ['Declaración jurada', 'Declaração sob juramento'],
			20 => ['Características de los certificados', 'Recursos do certificado'],
			21 => ['Plazo para la emisión del Certificado', 'Prazo para emissão do certificado'],
			22 => ['Certificado de Cumplimiento del ROM', 'Certificado de conformidade do ROM'],
			23 => ['Política Arancelaria Común', 'Política Tarifária Comum'],
			24 => ['Depósitos aduaneros', 'Depósitos aduaneiros'],
			25 => ['Solicitud de información adicional', 'Pedido de informações adicionais'],
			26 => ['Plazo de entrega de información', 'Prazo para entrega de informações'],
			27 => ['Confidencialidad', 'Confidencialidade'],
			28 => ['Apertura de investigación', 'Abertura da Investigação'],
			29 => ['Garantías', 'Garantias'],
			30 => ['Notificación de investigación', 'Notificação da Investigação'],
			31 => ['Competencia del EP importador', 'Competencia do EP importador'],
			32 => ['Plazo de entrega Art. 31', 'Prazo de entrega Art. 31'],
			33 => ['Participación de especialistas', 'Participação de especialistas'],
			34 => ['Denegación de preferencias', 'Negação de preferências'],
			35 => ['Plazo para concluir las investigaciones', 'Prazo para concluir investigações'],
			36 => ['Comunicación de resultados', 'Comunicação de Resultados'],
			37 => ['Plazo de la investigación', 'Encerramento da investigação'],
			38 => ['Conclusión sin descalificación', 'Conclusão sem desqualificação'],
			39 => ['Conclusión con descalificación', 'Conclusão com desqualificação'],
			40 => ['Mercadería importada de otro EEPP', 'Mercadoria importada de outro EP'],
			41 => ['Productos nacionalizados', 'Produtos nacionalizados'],
			42 => ['Disconformidad del EP exportador', 'Discordância do EP exportador'],
			43 => ['Solicitud de dictamen técnico', 'Pedido de parecer técnico'],
			44 => ['Elaboración del dictamen técnico', 'Preparação do parecer técnico'],
			45 => ['Representatividad de los expertos', 'Representação de Especialistas'],
			46 => ['Presentación de los EEPP', 'Apresentação dos EP'],
			47 => ['Consideración del Dictamen', 'Consideração do parecer técnico'],
			48 => ['Resolución de la CCM', 'Resolução da CCM'],
			49 => ['Solución de controversias', 'Resolução de disputas'],
			50 => ['Cómputo de los plazos', 'Cálculo de prazos'],
			51 => ['Autoridades competentes', 'Autoridades Competentes'],
			52 => ['Responsabilidad de las entidades', 'Responsabilidade das entidades'],
			53 => ['Sanciones por falsedad', 'Sanções por falsidade'],
			54 => ['Sanciones por adulteración', 'Sanções por adulteração'],
			55 => ['Facultades de la CCM', 'Atribuições da CCM'],
			56 => ['Beneficios relativos a zonas francas', 'Benefícios relativos a zonas francas'],
		];
	}

}
