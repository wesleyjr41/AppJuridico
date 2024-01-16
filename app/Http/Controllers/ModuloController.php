<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    //
    public function index()
    {
        $modulos = Modulo::all();
        return view('modulos.index', compact('modulos'));
    }

    public function create()
    {
        //
        return view('modulos.create');
    }

    public function store(Request $request)
    {
        //
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del Modulo es obligatorio.',
            'name.min' => 'El nombre del Modulo debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $modulo = new Modulo();
        $modulo->nombre = $request->input('name');
        $modulo->ruta = $request->input('ruta');
        $modulo->save();
        $notification = 'El Modulo se Ha creado correctamente';

        return redirect('/modulos')->with(compact('notification'));
    }

    public function edit(string $id)
    {
        $modulo = Modulo::find($id);
        return view('modulos.edit', compact('modulo'));
    }

    public function update(Request $request, Modulo $modulo)
    {
        //
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del Modulo es obligatorio.',
            'name.min' => 'El nombre del Modulo debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $modulo->nombre = $request->input('name');
        $modulo->ruta = $request->input('ruta');
        $modulo->update();
        $notification = 'El Modulo se Ha Actualizado correctamente';

        return redirect('/modulos')->with(compact('notification'));
    }

    public function destroy(Modulo $modulo)
    {
        //
        $deleteName = $modulo->nombre;
        $modulo->delete();
        $notification = 'El Modulo '. $deleteName . '  se Ha eliminado correctamente';
        return redirect('/modulos')->with(compact('notification'));
    }


}
