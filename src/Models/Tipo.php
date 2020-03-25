<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Mercosur\Ordenado\Config\Ordenado;
use Spatie\Translatable\HasTranslations;

class Tipo extends model
{
	use HasTranslations;

	public $translatable = ['tipo'];

	protected $table = Ordenado::PREFIJO . Ordenado::TIPOS;

	protected $fillable = ['tipo', 'abreviatura'];

	public static function byAbreviatura($abreviatura)
	{
		$tipo = static::where('abreviatura', Str::ucfirst(strtolower($abreviatura)))->first();

		if ($tipo)
			return $tipo;

		throw new Exception('El tipo de norma con la abreviatura [$abreviatua] no existente');
	}

	public function normas()
	{
		return $this->hasMany(Norma::class);
	}
}