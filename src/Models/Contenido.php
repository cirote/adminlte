<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Database\Eloquent\Model;
use Mercosur\Ordenado\Config\Ordenado;
use Spatie\Translatable\HasTranslations;

class Contenido extends model
{
	protected $expresiones = ['Pro Tempore', 'in situ'];

	protected $table = Ordenado::PREFIJO . Ordenado::CONTENIDO;

	protected $fillable = ['version_id', 'locale', 'contenido'];

	public function getContenidoAttribute($value)
	{
		foreach ($this->expresiones as $expresion)
		{
			$value = str_replace(
				$expresion,
				"<i>$expresion</i>",
				$value
			);
		}

		return $value;
	}
}