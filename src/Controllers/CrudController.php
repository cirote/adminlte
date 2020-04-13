<?php

namespace Cirote\Crud\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cirote\Crud\Models\Template;
use Cirote\Crud\Requests\CrudForm;

class CrudController extends Controller
{
	public function index()
    {
        return view('crud::index')
            ->withUsers(Template::all())
            ->withTitle('Listado de usuarios');
    }

    public function create()
    {
        return $this->edit(new Template());
    }

    public function store(CrudForm $request)
    {
        return $this->update($request, new Template());
    }

    public function edit(Template $crud)
    {
        return view('crud::edit')->withTemplate($crud);
    }

    public function update(CrudForm $request, Template $crud)
    {
        $request->persist($crud);

        return redirect(route('crud.index'));
    }
}
