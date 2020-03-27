<?php

namespace Mercosur\Regimenes\Models\Regimenes;

use App\Imports\ListaArgentinaImport;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Mercosur\Regimenes\Config\Regimenes;

class Lista extends Model
{
	protected $table = Regimenes::PREFIJO . Regimenes::LISTAS;

	protected $guarded = [];

	public function notificacion()
	{
		return $this->belongsTo(Notificacion::class);
	}

	public function regimen()
	{
		return $this->belongsTo(Regimen::class);
	}

	public function items()
	{
		return $this->hasMany(Item::class);
	}

	public function scopeComposicion($query)
	{
		return $query->where('tipo', 'composicion');
	}

	public function scopePeriodos($query)
	{
		return $query->select('anio', 'semestre')->orderByDesc('anio', 'semestre')->distinct();
	}
}

