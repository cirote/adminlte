<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Database\Eloquent\Model;
use Mercosur\Ordenado\Config\Ordenado;

class Pivote extends model
{
	protected $table = Ordenado::PREFIJO . Ordenado::ARTICULOS . '_' . Ordenado::CAPITULOS;
}