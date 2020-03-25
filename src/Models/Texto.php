<?php

namespace Mercosur\Ordenado\Models;

use App\Models\Acuerdos\Protocolo;
use Illuminate\Database\Eloquent\Model;
use Mercosur\Ordenado\Config\Ordenado;
use Spatie\Translatable\HasTranslations;

class Texto extends model
{
	use HasTranslations;

	public $translatable = ['titulo', 'naturaleza'];

	protected $table = Ordenado::PREFIJO . Ordenado::TEXTOS;

	protected $fillable = ['referencia', 'titulo', 'naturaleza'];

	public function capitulos()
	{
		return $this->hasMany(Capitulo::class, 'texto_id')
			->orderBy('orden');
	}
}