<?php

namespace Mercosur\Regimenes\Models\Regimenes;

use Illuminate\Database\Eloquent\Model;
use Mercosur\Regimenes\Config\Regimenes;

class Observacion extends Model
{
	protected $table = Regimenes::PREFIJO . Regimenes::OBSERVACIONES;

	protected $fillable = ['observacion'];
}
