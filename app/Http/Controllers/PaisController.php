<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\UsuarioRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paises = Pais::all();
        $usuarioRole = new UsuarioRole();
        $permiso =  $usuarioRole->getPermisosAsignados(Auth::user()->id, 4 );
        return view('pais.index', compact(['paises', 'permiso']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pais.create');

    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del País es obligatorio.',
            'name.min' => 'El nombre del País debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $pais = new Pais();
        $pais->name = $request->input('name');
        $pais->save();
        $notification = 'El País se Ha creado correctamente';

        return redirect('/pais')->with(compact('notification'));
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
    public function edit(Pais $pais)
    {
        //
        $usuarioRole = new UsuarioRole();
        $permiso =  $usuarioRole->getPermisosAsignados(Auth::user()->id, 4 );
        return view('pais.edit', compact(['pais', 'permiso']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pais $pais)
    {
        //
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del País es obligatorio.',
            'name.min' => 'El nombre del País debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $pais->name = $request->input('name');
        $pais->save();
        $notification = 'El País se Ha Actualizado correctamente';

        return redirect('/pais')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pais $pais)
    {
        //
        $deleteName = $pais->name;
        $pais->delete();
        $notification = 'El País '. $deleteName . '  se Ha eliminado correctamente';
        return redirect('/pais')->with(compact('notification'));
    }
}
