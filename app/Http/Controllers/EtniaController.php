<?php

namespace App\Http\Controllers;

use App\Models\Etnia;
use App\Models\UsuarioRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtniaController extends Controller
{
    //
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
        $etnias = Etnia::all();
        $usuarioRole = new UsuarioRole();
        $permiso =  $usuarioRole->getPermisosAsignados(Auth::user()->id, 6 );
        return view('etnia.index', compact(['etnias', 'permiso']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('etnia.create');

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
            'name.required' => 'El nombre de la Etnia es obligatorio.',
            'name.min' => 'El nombre de la Etnia debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $etnia = new Etnia();
        $etnia->name = $request->input('name');
        $etnia->save();
        $notification = 'La Etnia se Ha creado correctamente';

        return redirect('/etnia')->with(compact('notification'));
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
    public function edit(Etnia $etnia)
    {
        //
        $usuarioRole = new UsuarioRole();
        $permiso =  $usuarioRole->getPermisosAsignados(Auth::user()->id, 6 );
        return view('etnia.edit', compact(['etnia', 'permiso']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etnia $etnia)
    {
        //
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre de la Etnia es obligatorio.',
            'name.min' => 'El nombre de la Etnia debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $etnia->name = $request->input('name');
        $etnia->save();
        $notification = 'La Etnia se Ha Actualizado correctamente';

        return redirect('/etnia')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etnia $etnia)
    {
        //
        $deleteName = $etnia->name;
        $etnia->delete();
        $notification = 'La Etnia '. $deleteName . '  se Ha eliminado correctamente';
        return redirect('/etnia')->with(compact('notification'));
    }
}
