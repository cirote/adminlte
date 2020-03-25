<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Database\Eloquent\Model;
use Mercosur\Ordenado\Config\Ordenado;
use Spatie\Translatable\HasTranslations;

class Articulo extends model
{
	use HasTranslations;

	public $translatable = ['titulo'];

	protected $table = Ordenado::PREFIJO . Ordenado::ARTICULOS;

	protected $fillable = ['norma_id', 'orden', 'numero', 'titulo', 'publicar'];

	public function Capitulos()
	{
		return $this->belongsToMany(Capitulo::class,
			Ordenado::PREFIJO . Ordenado::ARTICULOS . '_' . Ordenado::CAPITULOS,
			'articulo_id',
			'capitulo_id'
		)
			->withPivot('orden', 'formato', 'numero_to')
			->orderBy('orden');
//
//		return $this->belongsTo(Capitulo::class, 'capitulo_id', 'id');
	}

	public function getCapituloAttribute(): Capitulo
	{
		if (isset($this->pivot))
		{
			return Capitulo::find($this->pivot->capitulo_id);
		}
	}

	public function textoOrdenado()
	{
		return $this->belongsTo(Texto::class, 'texto_id', 'id');
	}

	public function getTituloCompletoAttribute()
	{
		if (isset($this->pivot))
		{
			$modelo = trim('ordenado::ordenado.formato_articulo_' . $this->pivot->formato);

			return __($modelo, [
				'articulo' => $this->pivot->numero_to,
				'titulo' => $this->titulo
			]);
		}

		return $this->titulo;
	}

	public function versiones()
	{
		$normas = Norma::select('id as id1', 'aprobada_el', 'vigente_desde');

		return $this->hasMany(Version::class)
			->joinSub($normas, 'normas', 'norma_id', '=', 'normas.id1');
	}

	private function version($order = 'asc')
	{
		return $this->versiones()
			->orderBy('aprobada_el', $order);
	}

	private function versionVigente($order = 'asc')
	{
		return $this->version($order)
			->where('vigente_desde', '!=', null);
	}

	public function getPrimeraVersionAttribute()
	{
		return $this->version()->first();
	}

	public function getUltimaVersionAttribute()
	{
		return $this->version('desc')->first();
	}

	public function getPrimeraVersionVigenteAttribute()
	{
		return $this->versionVigente()->first();
	}

	public function getUltimaVersionVigenteAttribute()
	{
		return $this->versionVigente('desc')->first();
	}

	public function getHayVersionesNoVigentesAttribute()
	{
		return ($this->ultimaVersion->id !== $this->ultimaVersionVigente->id)
			? true
			: false;
	}
}