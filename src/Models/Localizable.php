<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Database\Eloquent\Model;

trait Localizable
{
	public function contenidos()
	{
		return $this->morphMany(Contenido::class, 'localizable');
	}

	public function getContenidoAttribute()
	{
		foreach ([\App::getLocale(), 'es', 'pt'] as $locale) {

			$contenido = Contenido::where('localizable_id', $this->id)
				->where('localizable_type', get_class($this))
				->where('locale', $locale)
				->first();

			if ($contenido) {
				return $contenido;
			}
		}
	}
}
