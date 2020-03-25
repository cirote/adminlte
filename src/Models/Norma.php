<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Database\Eloquent\Model;
use Mercosur\Ordenado\Config\Ordenado;
use Spatie\Translatable\HasTranslations;

class Norma extends model
{
	use HasTranslations;

	public $translatable = ['titulo', 'link'];

	protected $table = Ordenado::PREFIJO . Ordenado::NORMAS;

	protected $fillable = ['tipo_id', 'numero', 'año', 'titulo', 'link', 'aprobada_el', 'vigente_desde'];

	protected $dates = ['created_at', 'updated_at', 'aprobada_el', 'vigente_desde'];

	public static function byDatos($tipoNorma, $numero, $año)
	{
		$tipo = Tipo::byAbreviatura($tipoNorma);

		$norma = static::where('tipo_id', $tipo->id)
			->where('numero', $numero)
			->where('año', $año)
			->first();

		if ($norma)
			return $norma;

		throw new \Exception("La norma con el tipo [$tipoNorma], número [$numero] y el año [$año] no existe");

	}

	public function tipo()
	{
		return $this->belongsTo(Tipo::class);
	}

	public function articulos()
	{
		return $this->hasMany(Articulo::class);
	}

	public function articulo($numero): Articulo
	{
		return $this->articulos()->where('numero', $numero)->first();
	}

	public function getNombreAttribute(): string
	{
		return "{$this->tipo->tipo} Nº {$this->numero}/{$this->año}";
	}

	public function getFechaAprobacionAttribute()
	{
		return $this->aprobada_el->format('d/m/Y');
	}

	public function getFechaVigenciaAttribute()
	{
		return $this->vigente_desde->format('d/m/Y');
	}

	public function getATagAttribute()
	{
		$comillas = chr(34);

		return "<a href='{$this->link}' target='_blank'>{$this->nombre} {$comillas}{$this->titulo}{$comillas}</a>";
	}

	protected function getReferenciaNormativa()
	{
		return "<cite title='Source Title'>{$this->ATag}</cite>";
	}

	protected function getReferenciaCorta()
	{
		return "<cite title='Source Title'><a href='{$this->link}' target='_blank'>{$this->nombre}</a></cite>";
	}

	public function getTituloConVigenciaAttribute()
	{
		if ($this->estaVigente)
		{
			return $this->getReferenciaNormativa()
				. __('ordenado::ordenado.deFecha', ['fecha' => $this->fechaAprobacion])
				. __('ordenado::ordenado.vigencia', ['fecha' => $this->fechaVigencia]);
		}

		return $this->getReferenciaNormativa()
			. __('ordenado::ordenado.deFecha', ['fecha' => $this->fechaAprobacion])
			. __('ordenado::ordenado.noVigente');
	}

	public function getTituloCortoConVigenciaAttribute()
	{
		return $this->getReferenciaCorta();
	}

	public function getEstaVigenteAttribute()
	{
		return $this->vigente_desde != null;
	}
}