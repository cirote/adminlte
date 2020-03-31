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

	public function scopeUtilizacion($query)
	{
		return $query->where('tipo', 'utilizacion');
	}

	public function scopePeriodos($query, $periodo)
	{
		if ($periodo == 'trimestre')
		{
			return $query->select('anio', 'trimestre as periodo')->orderByDesc('anio', 'trimestre')->distinct();
		}

		if ($periodo == 'semestre')
		{
			return $query->select('anio', 'semestre as periodo')->orderByDesc('anio', 'semestre')->distinct();
		}

		return $query->select('anio')->orderByDesc('anio')->distinct();
	}
}

