<?php

namespace App\Http\Controllers;

use App\Models\Asesoria;
use App\Models\Cliente;
use App\Models\Role;
use App\Models\User;
use App\Models\Modulo;
use App\Models\Permiso;
use App\Models\RoleUser;
use App\Models\UsuarioRole;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\ModuloPermiso;
use App\Models\Patrocinio;
use App\Models\RoleModuloPermiso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function procesarCadena($cadena)
    {
        $cadenaFormateada = ucwords(str_replace('-', ' ', $cadena));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = RoleUser::select('role_id')->where('user_id', auth()->user()->id)->pluck('role_id');
        $select = RoleModuloPermiso::select('modulopermisoid')->whereIn('rolid', $roles)->get();
        $moduloId = ModuloPermiso::select('moduloid')->whereIn('modulopermisoid', $select)->get();
        $modulos = DB::table('modulos')->whereIn('moduloid', $moduloId)->get();

        $asesorias = Asesoria::all();
        $patrocinios = Patrocinio::all();
        $clientes = Cliente::all();

        return view('home', compact(['modulos', 'asesorias', 'patrocinios', 'clientes']));
    }
}
