<?php

namespace Mercosur\Regimenes\Commands\Importadores;

class BrasilUtilizacion extends ArgentinaUtilizacion
{
	protected const CELDA_ARANCEL_APLICADO = 'C';

	protected const CELDA_IMPORTACIONES_MERCOSUR = 'E';

	protected const CELDA_IMPORTACIONES_EXTRAZONA = 'F';

	protected const CELDA_EXPORTACIONES_MERCOSUR = 'H';

	protected const CELDA_EXPORTACIONES_EXTRAZONA = 'I';
}