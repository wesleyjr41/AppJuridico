<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
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
    public function edit(String $id)
    {
        //
        $roles = Role::all();
        $user = User::find($id);
        $role_ids = $user->roles()->pluck('Roles.rolid');

        return view('role_user.edit', compact(['user', 'roles', 'role_ids']));
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {        
        //dd($id);
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        $notification = 'se Ha asignado el role correctamente';

        return redirect('/usuarios')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
