<?php

namespace Mercosur\Regimenes\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Mercosur\Regimenes\Models\Regimenes\Lista;
use Mercosur\Regimenes\Models\Regimenes\Regimen;

class RegimenesController extends Controller
{
	public function index()
	{
		return view('regimenes::index')
			->withRegimenes(Regimen::all());
	}

	public function composicion(Regimen $regimen)
	{
		return view('regimenes::composicion')
			->withRegimen($regimen->load('listas.notificacion'));
	}

	public function composicion_items(Lista $lista)
	{
		return view('regimenes::composicion_items')
			->withLista($lista->load('items.observaciones'));
	}

	public function utilizacion(Regimen $regimen)
	{
		return view('regimenes::utilizacion')
			->withRegimen($regimen->load('listas.notificacion'));
	}

	public function utilizacion_items(Lista $lista)
	{
		return view('regimenes::utilizacion_items')
			->withLista($lista->load('items.observaciones'));
	}

	public function lista_nota(Lista $lista)
	{
		return Storage::download($lista->notificacion->directorio . '/' . $lista->notificacion->descargar);
	}

	public function lista_tabla(Lista $lista)
	{
		if ($lista->descargar)
			return Storage::download($lista->notificacion->directorio . '/' . $lista->descargar);

		return Storage::download($lista->notificacion->directorio . '/' . $lista->archivo);
	}
}
