<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Permiso;
use Illuminate\Http\Request;

class ModuloPermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $modulo = Modulo::find($id);
        $permisos = Permiso::all();
        $permiso_ids = $modulo->permisos()->pluck('Permisos.permisoid');
        //dd($permiso_ids);
        return view('modulo_permiso.edit', compact(['modulo', 'permisos', 'permiso_ids']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $modulo = Modulo::find($id);
        $modulo->permisos()->sync($request->permisos);
        $notification = 'Se ha realizado correctamente';

        return redirect('/modulos')->with(compact('notification'));

        //dd($modulo->permisos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
