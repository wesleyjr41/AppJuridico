<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\UsuarioRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneroController extends Controller
{
    //
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
        $generos = Genero::all();
        $usuarioRole = new UsuarioRole();
        $permiso =  $usuarioRole->getPermisosAsignados(Auth::user()->id, 5 );
        return view('genero.index', compact(['generos', 'permiso']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('genero.create');

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
            'name.required' => 'El nombre del Genero es obligatorio.',
            'name.min' => 'El nombre del Genero debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $genero = new Genero();
        $genero->name = $request->input('name');
        $genero->save();
        $notification = 'El Genero se Ha creado correctamente';

        return redirect('/genero')->with(compact('notification'));
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
    public function edit(Genero $genero)
    {
        //
        $usuarioRole = new UsuarioRole();
        $permiso =  $usuarioRole->getPermisosAsignados(Auth::user()->id, 5 );
        return view('genero.edit', compact(['genero', 'permiso']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genero $genero)
    {
        //
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del Genero es obligatorio.',
            'name.min' => 'El nombre del Genero debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $genero->name = $request->input('name');
        $genero->save();
        $notification = 'El Genero se Ha Actualizado correctamente';

        return redirect('/genero')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genero $genero)
    {
        //
        $deleteName = $genero->name;
        $genero->delete();
        $notification = 'El Genero '. $deleteName . '  se Ha eliminado correctamente';
        return redirect('/genero')->with(compact('notification'));
    }
}
