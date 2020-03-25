<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Database\Eloquent\Model;
use Mercosur\Ordenado\Config\Ordenado;

class Referencia extends model
{
	use Normable;

	protected $table = Ordenado::PREFIJO . Ordenado::REFERENCIAS;

	protected $fillable = ['version_id', 'norma_id'];

	public function getFuenteAttribute()
	{
		if ($this->estaVigente)
		{
			return __('ordenado::ordenado.referencia',
				[
					'norma' => $this->norma->tituloCortoConVigencia,
					'fecha' => $this->norma->fechaAprobacion,
					'vigencia' => $this->norma->fechaVigencia
				]);
		}

		return __('ordenado::ordenado.referenciaNV',
			[
				'norma' => $this->norma->tituloCortoConVigencia,
				'fecha' => $this->norma->fechaAprobacion
			]);
	}
}