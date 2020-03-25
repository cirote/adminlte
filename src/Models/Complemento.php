<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Database\Eloquent\Model;
use Mercosur\Ordenado\Config\Ordenado;

class Complemento extends model
{
	use Normable;

	use Localizable;

	protected $table = Ordenado::PREFIJO . Ordenado::COMPLEMENTOS;

	protected $fillable = ['version_id', 'norma_id'];

	public function getFuenteAttribute()
	{
		if ($this->estaVigente)
		{
			return __('ordenado::ordenado.complemento', ['norma' => $this->norma->tituloCortoConVigencia, 'texto' => $this->contenido->contenido]);
		}

		return __('ordenado::ordenado.complementoNV', ['norma' => $this->norma->tituloCortoConVigencia, 'texto' => $this->contenido->contenido]);
	}
}