<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\EstadoFormulario;
use App\Http\Requests\EstadoFormularioRequest;

class EstadoFormulariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $estadoformularios= EstadoFormulario::all();
        return view('estadoformularios.index', ['estadoformularios'=>$estadoformularios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('estadoformularios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EstadoFormularioRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EstadoFormularioRequest $request)
    {
        $estadoformulario = new EstadoFormulario;
		$estadoformulario->nombre = $request->input('nombre');
        $estadoformulario->save();

        return to_route('estadoformularios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $estadoformulario = EstadoFormulario::findOrFail($id);
        return view('estadoformularios.show',['estadoformulario'=>$estadoformulario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $estadoformulario = EstadoFormulario::findOrFail($id);
        return view('estadoformularios.edit',['estadoformulario'=>$estadoformulario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EstadoFormularioRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EstadoFormularioRequest $request, $id)
    {
        $estadoformulario = EstadoFormulario::findOrFail($id);
		$estadoformulario->nombre = $request->input('nombre');
        $estadoformulario->save();

        return to_route('estadoformularios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $estadoformulario = EstadoFormulario::findOrFail($id);
        $estadoformulario->delete();

        return to_route('estadoformularios.index');
    }
}
