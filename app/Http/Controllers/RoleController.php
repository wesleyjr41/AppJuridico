<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('roles.create');
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
            'name.required' => 'El nombre del Role es obligatorio.',
            'name.min' => 'El nombre del Role debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $role = new Role();
        $role->nombre = $request->input('name');
        $role->save();
        $notification = 'El Role se Ha creado correctamente';

        return redirect('/roles')->with(compact('notification'));
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
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del Role es obligatorio.',
            'name.min' => 'El nombre del Role debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $role->nombre = $request->input('name');
        $role->update();
        $notification = 'El Role se Ha Actualizado correctamente';

        return redirect('/roles')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
        $deleteName = $role->nombre;
        $role->delete();
        $notification = 'El Role '. $deleteName . '  se Ha eliminado correctamente';
        return redirect('/roles')->with(compact('notification'));
    }
}
