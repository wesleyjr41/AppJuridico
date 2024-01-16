<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pais;
use App\Models\User;
use App\Models\Zona;
use App\Models\Etnia;
use App\Models\Estado;
use App\Models\Genero;
use App\Models\Cliente;
use App\Models\Profile;
use App\Models\Ocupacion;
use App\Models\Instruccion;
use App\Models\UsuarioRole;
use App\Models\Estado_civil;
use Illuminate\Http\Request;
use App\Models\Nivel_ingresos;
use App\Rules\CedulaValidationRule;
use Illuminate\Support\Facades\Auth;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function search(Request $request)
    {
        $search = $request->search;
        $cliente = new Cliente();

        $clientes_id = Cliente::join('profiles', 'profiles.id', '=', 'clientes.profile_id')
        ->select('clientes.id')
        ->where('nombres', 'like', "%$search%")
        ->orWhere('apellidos', 'like', "%$search%")
        ->orWhere('identificacion', 'like', "%$search%")
        ->groupBy('clientes.id')
        ->get();
        
        $clientes = Cliente::find($clientes_id);

        $usuarioRole = new UsuarioRole();
        $permiso =  $usuarioRole->getPermisosAsignados(Auth::user()->id, 3 );

        return view('clientes.index', compact(['search', 'permiso', 'clientes']));
        
    }

    public function calcularEdad($fechaNacimiento)
    {
        $fechaNacimiento = Carbon::parse($fechaNacimiento);
        $edad = $fechaNacimiento->age;

        return $edad;
    }

    public function index()
    {
        //
        $clientes = Cliente::all(); 
        $usuarioRole = new UsuarioRole();
        $permiso =  $usuarioRole->getPermisosAsignados(Auth::user()->id, 3 );
        //dd($clientes);
        return view('clientes.index', compact('clientes', 'permiso'));
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $generos = Genero::all();
        $paises = Pais::all();
        $etnias = Etnia::all();
        $instruccion = Instruccion::all();
        $ocupacion = Ocupacion::all();
        $estado = Estado_civil::all();
        $nivel_ingresos = Nivel_ingresos::all();
        $zona = Zona::all();
        
       
        return view('clientes.create', compact(['generos','paises', 'etnias', 'instruccion', 'ocupacion', 'estado', 'nivel_ingresos', 'zona' ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'apellidos' => 'required|max:50',
            'nombres' => 'required|max:50',
            'identificacion' => ['required', new CedulaValidationRule],
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required',
            'pais' => 'required',
            'etnia' => 'required',
            'instruccion' => 'required',
            'ocupacion' => 'required',
            'estado' => 'required',
            'nivel_ingresos' => 'required',
            'zona' => 'required',
            'telefono' => 'required',
            'discapacidad' => 'required',
            'bono' => 'required',
            'direccion' => 'required|max:50',
            

        ];

        $messages = [
            'apellidos.required' => 'Los Apellidos son obligatorios.',
            'nombres.required' => 'Los nombres son obligatorios.',
            'identificacion.required' => 'El Número de Cédula es obligatorio.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatorio.',
            'edad.required' => 'La Edad es obligatorio.',
            'genero.required' => 'El Genero es obligatorio.',
            'pais' => 'El Pais de nacimiento es obligatorio.',
            'etnia' => 'La Etnia es obligatorio.',
            'instruccion' => 'La Instrucción es obligatorio.',
            'ocupacion' => 'La Ocupación es obligatorio.',
            'estado' => 'El Estado Civil es obligatorio.',
            'nivel_ingresos' => 'El Nivel de Ingresos es obligatorio.',
            'zona' => 'La Zona en la que vive es Obligatorio.',
            'telefono.required' => 'El Telefono es obligatorio.',
            'discapacidad' => 'El Campo Discapacidad es obligatorio.',
            'bono' => 'El Campo Recibe Bono es obligatorio.',
            'direccion.required' => 'La direccion es obligatorio.'
        ];


        $this->validate($request, $rules, $messages);

        $profile = new Profile();
        $profile->apellidos = $request->input('apellidos');
        $profile->nombres = $request->input('nombres');
        $profile->identificacion = $request->input('identificacion');
        $profile->fecha_nacimiento = $fechaNacimiento =  $request->input('fecha_nacimiento');
        $profile->edad = $this->calcularEdad($fechaNacimiento);
        $profile->telefono = $request->input('telefono');
        $profile->direccion = $request->input('direccion');
        $profile->genero_id = $request->input('genero');
        $profile->etnia_id = $request->input('etnia');
        $profile->pais_id = $request->input('pais');
        $profile->save();
        
        $cliente = new Cliente();
        $cliente->instruccion_id = $request->input('instruccion');
        $cliente->ocupacion_id = $request->input('ocupacion');
        $cliente->estado_civil_id = $request->input('estado');
        $cliente->nivel_ingresos_id = $request->input('nivel_ingresos');
        $cliente->bono = $request->input('bono');
        $cliente->discapacidad = $request->input('discapacidad');
        $cliente->Zona_vive_id = $request->input('zona');
        $cliente->profile_id = $profile->id;
       
        $cliente->save();
        $notification = 'El Cliente Ha sido Creado correctamente';

        return redirect('/clientes')->with(compact('notification')); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       $profile = Profile::find($id);
        return view('clientes.show', compact('profile'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $cliente = Cliente::find($id);
        //dd($cliente);
        $profile = Profile::find($cliente->profile_id);
        $generos = Genero::all();
        $etnias = Etnia::all();
        $paises = Pais::all();
        $instruccion = Instruccion::all();
        $ocupacion = Ocupacion::all();
        $estado = Estado::all();
        $estado_civil = Estado_civil::all();
        $nivel_ingresos = Nivel_ingresos::all();
        $zona = Zona::all();
        $usuarioRole = new UsuarioRole();
        $permiso =  $usuarioRole->getPermisosAsignados(Auth::user()->id, 3 );
        return view('clientes.edit', compact(['cliente', 'profile', 'generos','etnias', 'permiso', 'paises', 'instruccion', 'ocupacion', 'estado', 'estado_civil', 'nivel_ingresos', 'zona' ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rules = [
            'apellidos' => 'required|max:50',
            'nombres' => 'required|max:50',
            'identificacion' => 'required|numeric|min:10',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|numeric',
            'genero' => 'required',
            'pais' => 'required',
            'etnia' => 'required',
            'instruccion' => 'required',
            'ocupacion' => 'required',
            'estado' => 'required',
            'nivel_ingresos' => 'required',
            'zona' => 'required',
            'telefono' => 'required|numeric|min:10',
            'discapacidad' => 'required',
            'bono' => 'required',
            'direccion' => 'required|max:50',
            

        ];

        $messages = [
            'apellidos.required' => 'Los Apellidos son obligatorios.',
            'nombres.required' => 'Los nombres son obligatorios.',
            'identificacion.required' => 'El Número de Cédula es obligatorio.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatorio.',
            'edad.required' => 'La Edad es obligatorio.',
            'genero.required' => 'El Genero es obligatorio.',
            'pais' => 'El Pais de nacimiento es obligatorio.',
            'etnia' => 'La Etnia es obligatorio.',
            'instruccion' => 'La Instrucción es obligatorio.',
            'ocupacion' => 'La Ocupación es obligatorio.',
            'estado' => 'El Estado Civil es obligatorio.',
            'nivel_ingresos' => 'El Nivel de Ingresos es obligatorio.',
            'zona' => 'La Zona en la que vive es Obligatorio.',
            'telefono.required' => 'El Telefono es obligatorio.',
            'discapacidad' => 'El Campo Discapacidad es obligatorio.',
            'bono' => 'El Campo Recibe Bono es obligatorio.',
            'direccion.required' => 'La direccion es obligatorio.'
        ];


        $this->validate($request, $rules, $messages);

        $profile = Profile::find($id);
        $profile->apellidos = $request->input('apellidos');
        $profile->nombres = $request->input('nombres');
        $profile->identificacion = $request->input('identificacion');
        $profile->fecha_nacimiento = $request->input('fecha_nacimiento');
        $profile->edad = $request->input('edad');
        $profile->telefono = $request->input('telefono');
        $profile->direccion = $request->input('direccion');
        $profile->genero_id = $request->input('genero');
        $profile->etnia_id = $request->input('etnia');
        $profile->pais_id = $request->input('pais');
        $profile->update();
        
        $cliente = $profile->clientes;
        $cliente->instruccion_id = $request->input('instruccion');
        $cliente->ocupacion_id = $request->input('ocupacion');
        $cliente->estado_civil_id = $request->input('estado');
        $cliente->nivel_ingresos_id = $request->input('nivel_ingresos');
        $cliente->bono = $request->input('bono');
        $cliente->discapacidad = $request->input('discapacidad');
        $cliente->zona_vive_id = $request->input('zona');
        $cliente->update();

        $notification = 'El Cliente Ha sido Actualizado correctamente';
        return redirect('/clientes')->with(compact('notification')); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
