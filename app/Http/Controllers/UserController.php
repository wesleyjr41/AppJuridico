<?php

namespace App\Http\Controllers;

use App\Models\Etnia;
use App\Models\Genero;
use App\Models\Pais;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\CedulaValidationRule;
use App\Rules\NumeroCelularValidationRule;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function calcularEdad($fechaNacimiento)
    {
        $fechaNacimiento = Carbon::parse($fechaNacimiento);
        $edad = $fechaNacimiento->age;

        return $edad;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $generos = Genero::all();
        $etnias = Etnia::all();
        $paises = Pais::all();
        return view('usuarios.create', compact(['generos', 'etnias', 'paises']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'identificacion' => ['required', new CedulaValidationRule],
            'fecha_nacimiento' => ['required', 'date'],
            'genero' => ['required'],
            'etnia' => ['required'],
            'telefono' => ['required'],
            'direccion' => ['required', 'string', 'max:255'],
            'pais' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required','confirmed','min:6']
        ];

        $messages = [
            'name.required' => 'El nombre de Usuario es obligatorio.',
            'name.string' => 'El nombre de Usuario no debe contener numeros.',

        ];


        $this->validate($request, $rules, $messages);

        //PROFILE
        $profile = new Profile();
        $profile->nombres = $request->input('nombres');
        $profile->apellidos = $request->input('apellidos');
        $profile->identificacion = $request->input('identificacion');
        $profile->fecha_nacimiento = $fechaNacimiento =  $request->input('fecha_nacimiento');
        $profile->edad = $this->calcularEdad($fechaNacimiento);
        $profile->telefono = $request->input('telefono');
        $profile->direccion = $request->input('direccion');
        $profile->genero_id = $request->input('genero');
        $profile->etnia_id = $request->input('etnia');
        $profile->pais_id = $request->input('pais');
        $profile->save();

        //USUARIO
        $usuario = new User();
        $usuario->name = explode(' ', trim($profile->nombres))[0].' '.explode(' ', trim($profile->apellidos))[0];
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->profile_id =  $profile->id;
        $usuario->save();

        $notification = 'El Usuario se Ha creado correctamente';
        return redirect('/usuarios')->with(compact('notification'));
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
    

    public function reset(User $usuario)
    {
        //
        return view('usuarios.resetpassword', compact('usuario'));
    }

    public function ChangeReset(Request $request, User $usuario)
    {
        //

       $rules = [
            'password' => ['required', 'string', 'confirmed', 'min:4'],
            'password_confirmation' => ['required', 'min:4'],
        ];

        $messages = [
            'password.required' => 'La Contraseña es obligatorio.',
            'password_confirmation.required' => 'La confirmacion de Contraseña es obligatorio.',
        ];


        $this->validate($request, $rules, $messages);

        $usuario->password = $request->input('password');

        $usuario->update();

        $notification = 'La Contraseña se Ha cambiado correctamente';
        return redirect('usuario/'.$usuario->id.'/reset')->with(compact('notification'));

    }

    public function edit(User $usuario)
    {
        $profile = Profile::find($usuario->profile_id);
        //dd($profile);
        $generos = Genero::all();
        $etnias = Etnia::all();
        $paises = Pais::all();
        return view('usuarios.edit', compact(['usuario', 'generos', 'etnias', 'paises', 'profile']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $rules = [
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'identificacion' => ['required', new CedulaValidationRule],
            'fecha_nacimiento' => ['required', 'date'],
            'email' => ['required', 'string', 'lowercase', 'email'],
            'genero' => ['required'],
            'etnia' => ['required'],
            'telefono' => ['required'],
            'direccion' => ['required', 'string', 'max:255'],
            'pais' => ['required'],
        ];

        $messages = [
            'name.required' => 'El nombre de Usuario es obligatorio.',
            'name.string' => 'El nombre de Usuario no debe contener numeros.',

        ];


        $this->validate($request, $rules, $messages);


        //PROFILE
        $profile = Profile::find($usuario->profile_id);
        $profile->nombres = $request->input('nombres');
        $profile->apellidos = $request->input('apellidos');
        $profile->identificacion = $request->input('identificacion');
        $profile->fecha_nacimiento = $fechaNacimiento =  $request->input('fecha_nacimiento');
        $profile->edad = $this->calcularEdad($fechaNacimiento);
        $profile->telefono = $request->input('telefono');
        $profile->direccion = $request->input('direccion');
        $profile->genero_id = $request->input('genero');
        $profile->etnia_id = $request->input('etnia');
        $profile->pais_id = $request->input('pais');

        $usuario = User::find($usuario->id);
        $usuario->name = explode(' ', trim($profile->nombres))[0].' '.explode(' ', trim($profile->apellidos))[0];
        $usuario->email = $request->input('email');

        $profile->update();
        $usuario->update();

        $notification = 'El Usuario se Ha actualizado correctamente';
        return redirect('/usuario/'.$usuario->id .'/edit')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $deleteName = $usuario->name;
        $usuario->delete();
        $notification = 'El Usuario ' . $deleteName . '  se Ha eliminado correctamente';
        return redirect('/usuarios')->with(compact('notification'));
    }
}
