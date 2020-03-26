<?php

namespace Mercosur\Regimenes\Models\Regimenes;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Mercosur\Regimenes\Config\Regimenes;

class Regimen extends Model
{
	use HasTranslations;

	protected $table = Regimenes::PREFIJO . Regimenes::REGIMENES;

	protected $translatable = ['nombre'];

	protected $guarded = [];
	
	public static function byAbreviatura($abreviatura)
	{
		return static::where('abreviatura', $abreviatura)->first();
	}
}
