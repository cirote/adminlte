<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Mercosur\Ordenado\Config\Ordenado;
use Spatie\Translatable\HasTranslations;

class Version extends model
{
	const TEXTO_FIJO = '@@';

	use Localizable;

	use HasTranslations;

	protected $table = Ordenado::PREFIJO . Ordenado::VERSIONES_NUEVO;

	protected $fillable = ['articulo_id', 'norma_id', 'original', 'numero_en_la_norma', 'texto_fuente'];

	public $translatable = ['texto_fuente'];

	public function referencias()
	{
		return $this->hasMany(Referencia::class);
	}

	public function crearReferencia(Norma $norma)
	{
		$refer = $this->referencias()->where('norma_id', $norma->id)->first();

		if ($refer)
		{
			return $refer;
		}

		return $this->referencias()->create([
			'norma_id' => $norma->id
		]);
	}

	public function complementos()
	{
		return $this->hasMany(Complemento::class);
	}

	public function crearComplemento(Norma $norma)
	{
		$refer = $this->complementos()->where('norma_id', $norma->id)->first();

		if ($refer)
		{
			return $refer;
		}

		return $this->complementos()->create([
			'norma_id' => $norma->id
		]);
	}

	public function norma()
	{
		return $this->belongsTo(Norma::class);
	}

	public function getEsOriginalAttribute()
	{
		return $this->original['original'];
	}

	public function getFuenteAttribute()
	{
		if (Str::startsWith($this->texto_fuente, static::TEXTO_FIJO))
		{
			return Str::after($this->texto_fuente, static::TEXTO_FIJO);
		}

		return $this->norma->estaVigente
			? $this->fuenteVigente
			: $this->fuenteNoVigente;
	}

	public function getFuenteVigenteAttribute()
	{
		return $this->esOriginal
			? $this->fuenteVigenteOriginal . $this->norma->tituloConVigencia
			: $this->fuenteVigenteNoOriginal . $this->norma->tituloConVigencia;
	}

	protected function getFuenteVigenteOriginalAttribute()
	{
		return $this->texto_fuente
			? __('ordenado::ordenado.original_t', ['fuente' => $this->texto_fuente])
			: __('ordenado::ordenado.original', ['articulo' => $this->numeroDeArticulo]);
	}

	protected function getFuenteVigenteNoOriginalAttribute()
	{
		return __('ordenado::ordenado.modificado', ['articulo' => $this->numeroDeArticulo]);
	}

	public function getFuenteNoVigenteAttribute()
	{
		return __('ordenado::ordenado.modificadoNV', ['articulo' => $this->numeroDeArticulo])
			. $this->norma->tituloConVigencia;
	}

	public function getNumeroDeArticuloAttribute()
	{
		return trim($this->numero_en_la_norma);
	}

	public function getTextoAttribute()
	{
		return $this->contenido->contenido;
	}
}