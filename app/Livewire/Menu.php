<?php

namespace App\Livewire;

use App\Models\Menu as Menus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {   $menus = Menus::whereNull('padre_id')
        ->select(
            'menus.id',
            'menus.nombre',
            'menus.orden',
            'menus.ruta',
            'menus.icono'
            )
        ->Join('menu_role', 'menus.id', 'menu_role.menu_id')
        ->Join('role_user', 'menu_role.role_id', 'role_user.role_id')
        ->join('users', 'role_user.user_id', 'users.id')
        ->where('users.id', auth()->user()->id)
        ->orderBy('orden', 'asc')
        ->get();

        $menu= Menus::all();
        /*  foreach ($menus as $key => $menu) {
            echo('PADRE ' .$menu->id .$menu->nombre. '<br/>');   
            $query =  Menus::where('padre_id', $menu->id)->orderBy('orden', 'asc')->get();
            foreach ($query as  $key => $sub_menu) {
                echo('HIJO'. $sub_menu. '<br/>');
            }
        } */
        return view('livewire.menu')->with([
            'menus' => $menus,
            'menu' => $menu
        ]);
    }
}
