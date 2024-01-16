<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Role;
use App\Models\RoleModuloPermiso;
use Illuminate\Http\Request;

class RoleModuleController extends Controller
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
    public function store(Request $request, String $id)
    {
        //
        $permisos = $request->get('permisos');
        //dd($permisos);
    
        RoleModuloPermiso::where('rolid', $id)->delete();
        
        if(!empty($permisos)){
            foreach ($permisos as $p) {

                $tmp = new RoleModuloPermiso;
                $tmp->rolid = $id;
                $tmp->modulopermisoid = $p;
                $tmp->save();
            }
        }
        
        //$roles = UsuarioRol::where('usuarioid', Auth::id())->get();
        $roles = Role::all();
        $notification = 'se Ha asignado el role correctamente';
        return view('roles.index', compact('roles'))->with(compact('notification'));
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
        $role = Role::find($id);   
        $modulos = Modulo::with('modulopermiso', 'modulopermiso.permisos')->orderBy('nombre')->get();
        $rmp = RoleModuloPermiso::where('rolid', $id)->select('modulopermisoid')->pluck('modulopermisoid')->toArray();
        return view('role_module.edit', compact(['modulos', 'rmp', 'role']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $role = Role::find($id);
        
        $notification = 'se Ha asignado el role correctamente';
        return redirect('/role_module/'.$role->id. '/edit')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
