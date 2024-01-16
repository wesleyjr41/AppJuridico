<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    //
    public function index()
    {
        //
        $permisos = Permiso::all();
        return view('permisos.index', compact('permisos'));
    }

    public function create()
    {
        //
        return view('permisos.create');
    }
    
    public function store(Request $request)
    {
        //
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del Permiso es obligatorio.',
            'name.min' => 'El nombre del Permiso debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $permiso = new Permiso();
        $permiso->nombre = $request->input('name');
        $permiso->save();
        $notification = 'El Permiso se Ha creado correctamente';

        return redirect('/permisos')->with(compact('notification'));
    }

    public function edit(Permiso $permiso)
    {
        return view('permisos.edit', compact('permiso'));
    }

    public function update(Request $request, Permiso $permiso)
    {
        //
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del Permiso es obligatorio.',
            'name.min' => 'El nombre del Permiso debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $permiso->nombre = $request->input('name');
        $permiso->update();
        $notification = 'El Permiso se Ha Actualizado correctamente';

        return redirect('/permisos')->with(compact('notification'));
    }

    public function destroy(Permiso $permiso)
    {
        //
        $deleteName = $permiso->nombre;
        $permiso->delete();
        $notification = 'El Permiso '. $deleteName . '  se Ha eliminado correctamente';
        return redirect('/permisos')->with(compact('notification'));
    }
}
