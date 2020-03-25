<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Database\Eloquent\Model;
use Mercosur\Ordenado\Config\Ordenado;
use Spatie\Translatable\HasTranslations;

class Capitulo extends model
{
	use HasTranslations;

	public $translatable = ['titulo'];

	protected $table = Ordenado::PREFIJO . Ordenado::CAPITULOS;

	protected $fillable = ['texto_id', 'orden', 'numero', 'formato', 'titulo', 'publicar'];

	public function articulos()
	{
		return $this->belongsToMany(Articulo::class,
			Ordenado::PREFIJO . Ordenado::ARTICULOS . '_' . Ordenado::CAPITULOS,
			'capitulo_id',
			'articulo_id'
		)
			->withPivot('orden', 'formato', 'numero_to')
			->orderBy('orden');
	}

	public function getTituloCompletoAttribute()
	{
		return __(
			trim('ordenado::ordenado.formato_capitulo_' . $this->formato),
			[
				'numero' => $this->numero,
				'titulo' => $this->titulo
			]);
	}

	public function crearArticulo(Array $datos): Articulo
	{
		$articulo = Articulo::where('norma_id', $datos['norma_id'])
			->where('numero', $datos['numero'])
			->first();

		if ($articulo)
		{
			$this->articulos()->attach($articulo);
		}
		else
		{
			$articulo = $this->articulos()->create([
				'norma_id' => $datos['norma_id'],
				'numero' => $datos['numero'],
				'publicar' => $datos['publicar'] ?? true,
				'titulo' => $datos['titulo'],
			]);
		}

		$articulo = $this->articulos()->find($articulo->id);

		$articulo->pivot->texto_id  = $datos['texto_id'];
		$articulo->pivot->formato   = $datos['formato'] ?? '1';
		$articulo->pivot->orden     = $datos['orden'];
		$articulo->pivot->numero_to = $datos['numero_to'];

		$articulo->pivot->save();

		return $articulo;
	}

	public function textoOrdenado()
	{
		return $this->belongsTo(Texto::class, 'texto_id', 'id');
	}
}