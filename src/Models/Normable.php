<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Database\Eloquent\Model;

trait Normable
{
	public function norma()
	{
		return $this->belongsTo(Norma::class);
	}

	public function getFuenteAttribute()
	{
		return $this->norma->tituloConVigencia;
	}

	public function getEstaVigenteAttribute()
	{
		return $this->norma->estaVigente;
	}
}