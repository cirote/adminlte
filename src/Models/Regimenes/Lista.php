<?php

namespace Mercosur\Regimenes\Models\Regimenes;

use App\Imports\ListaArgentinaImport;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Mercosur\Regimenes\Config\Regimenes;

class Lista extends Model
{
	protected $table = Regimenes::PREFIJO . Regimenes::LISTAS;

	public static function import_file($file_name)
	{
		$path = 'app/data/regimenes/notificaciones/argentina/DIMEC_366-19/';

		$file = storage_path($path . $file_name);

		Excel::import(new ListaArgentinaImport(), $file);
	}
}

