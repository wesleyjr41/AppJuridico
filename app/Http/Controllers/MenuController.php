<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use function Laravel\Prompts\alert;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showMenu()
{
    alert('0');
    $menu = [];

    if (Gate::allows('Administrador')) {
        $menu[] = 'Panel de Control';
        $menu[] = 'Configuración';
    }

    if (Gate::allows('Secretaria')) {
        $menu[] = 'Inicio';
        $menu[] = 'Perfil';
    }

    if (Gate::allows('Abogada')) {
        $menu[] = 'Inicio';
        $menu[] = 'Perfil';
    }

    if (Gate::allows('Auxiliar')) {
        $menu[] = 'Inicio';
        $menu[] = 'Perfil';
    }

    dd($menu);


    return view('includes.panel.menu')->with('menu', $menu);
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $menus = Menu::all();
        return view('menus.create', compact('menus'));
    }
    
    public function getMenus()
    {

    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'nombre' => 'required|min:3',
            'ruta' => 'required|min:3',
            'icono' => 'required|min:3'
        ];

        $messages = [
            'nombre.required' => 'El nombre del Menú es obligatorio.',
            'nombre.min' => 'El nombre del Menú debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $menu = new Menu();
        $menu->nombre = $request->input('nombre');
        $menu->orden = $request->input('orden');
        $menu->ruta = $request->input('ruta');
        $menu->icono = $request->input('icono');
        $menu->padre_id = $request->input('padre');
        $menu->save();
        $notification = 'El Menú se Ha creado correctamente';

        return redirect('/menus')->with(compact('notification'));
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
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
        $rules = [
            'nombre' => 'required|min:3'
        ];

        $messages = [
            'nombre.required' => 'El nombre del Menú es obligatorio.',
            'nombre.min' => 'El nombre del Menú debe tener mas de 3 caracteres.',

        ];


        $this->validate($request, $rules, $messages);

        $menu->nombre = $request->input('nombre');
        $menu->orden = $request->input('orden');
        $menu->ruta = $request->input('ruta');
        $menu->icono = $request->input('icono');
        $menu->update();

        $notification = 'El Menú se Ha Actualizado correctamente';
        return redirect('/menus')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
        $deleteName = $menu->nombre;
        $menu->delete();
        $notification = 'El Menú '. $deleteName . '  se Ha eliminado correctamente';
        return redirect('/menus')->with(compact('notification'));
    }

    public function roleMenuEdit(String $id){

        //dd($id);
        $roles = Role::all();
        $menu = Menu::find($id);
        $role_ids = $menu->roles()->pluck('Roles.rolid');
        //dd($role_ids);

        return view('menu_role.edit', compact(['roles', 'menu', 'role_ids']));
    }

    public function roleMenu(Request $request, String $id){

        //dd($id);
        $menu = Menu::find($id);
        $menu->roles()->sync($request->roles);
        $notification = 'se Ha asignado el role correctamente';

        return redirect('/menus')->with(compact('notification'));
    }
}
