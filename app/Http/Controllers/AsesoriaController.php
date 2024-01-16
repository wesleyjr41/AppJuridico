<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CJGA;
use App\Models\Pais;
use App\Models\Zona;
use App\Models\Etnia;
use App\Models\Genero;
use App\Models\Cliente;
use App\Models\Profile;
use App\Models\Asesoria;
use App\Models\Ciudades;
use App\Models\Derivado;
use App\Models\Materias;
use App\Models\Ocupacion;
use App\Models\Servicios;
use App\Models\Patrocinio;
use App\Models\Provincias;
use App\Models\Instruccion;
use App\Models\UsuarioRole;
use App\Models\Estado_civil;
use App\Models\Tipo_usuario;
use Illuminate\Http\Request;
use App\Models\Nivel_ingresos;
use App\Models\Estado_derivada;
use App\Models\Linea_servicios;
use App\Rules\CedulaValidationRule;
use Illuminate\Support\Facades\Auth;

class AsesoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function calcularEdad($fechaNacimiento)
    {
        $fechaNacimiento = Carbon::parse($fechaNacimiento);
        $edad = $fechaNacimiento->age;

        return $edad;
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $asesorias = Asesoria::whereHas('clientes', function ($query) use ($search) {
            $query->whereHas('profiles', function ($subquery) use ($search) {
                $subquery->where('nombres', 'LIKE', '%' . $search . '%')
                ->orWhere('apellidos', 'LIKE', '%' . $search . '%')
                ->orWhere('identificacion', 'LIKE', '%' . $search . '%')
                ->orWhere('asesorias.nombres_abogado', 'LIKE', '%' . $search . '%');
            });
        })->get();

        //dd($asesorias);
        return view('asesorias.index', compact(['asesorias']));
        
    }
    
    public function index()
    {
        $asesorias = Asesoria::all();
        $usuarioRole = new UsuarioRole();
        $permiso =  $usuarioRole->getPermisosAsignados(Auth::user()->id, 1 );
        return view('asesorias.index', compact(['asesorias', 'permiso']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        $cliente = Cliente::find($id);
        $cjga = CJGA::all();
        $provincias = Provincias::all();
        $generos = Genero::all();
        $paises = Pais::all();
        $etnias = Etnia::all();
        $ciudades = Ciudades::all();
        $lineaServicios = Linea_servicios::all();
        $ocupacion = Ocupacion::all();
        $estado_civil = Estado_civil::all();
        $nivel_ingresos = Nivel_ingresos::all();
        $zona = Zona::all();
        $instruccion = Instruccion::all();
        $materias = Materias::all();
        $servicios = Servicios::all();
        $clientes = Cliente::all();
        $tipoUsuarios = Tipo_usuario::all();
        $derivados = Derivado::all();
        $estadosCausa = Estado_derivada::all();
        $lineas = Linea_servicios::all();
        $materias = Materias::all();
        return view('asesorias.create', compact(
            ['cjga', 'provincias','nivel_ingresos','lineas','materias', 'zona',  'cliente', 'estado_civil', 'ocupacion' ,'instruccion','generos', 'paises', 'etnias',  'ciudades','lineaServicios', 'materias', 'servicios', 'clientes', 'tipoUsuarios', 'derivados', 'estadosCausa' 
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cliente $cliente)
    {
        $rules = [
            'apellidos' => 'required|max:50',
            'nombres' => 'required|max:50',
            'identificacion' => ['required', new CedulaValidationRule],
            'fecha_nacimiento' => 'required|date',
            'genero' => ['required'],
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
            'CJGA' => 'required',
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
        
        //DATOS DEL CLIENTE
        //PROFILE
        $asesoria = new Asesoria();
        $asesoria->cliente_id = $request->input('cliente_id');
        $asesoria->apellidos = $request->input('apellidos');
        $asesoria->nombres = $request->input('nombres');
        $asesoria->identificacion = $request->input('identificacion');
        $asesoria->fecha_nacimiento = $fechaNacimiento =  $request->input('fecha_nacimiento');
        $asesoria->edad = $this->calcularEdad($fechaNacimiento);
        $asesoria->telefono = $request->input('telefono');
        $asesoria->direccion = $request->input('direccion');
        $asesoria->genero_id = $request->input('genero');
        $asesoria->etnia_id = $request->input('etnia');
        $asesoria->pais_id = $request->input('pais');
        //CLIENTE
        $asesoria->instruccion_id = $request->input('instruccion');
        $asesoria->ocupacion_id = $request->input('ocupacion');
        $asesoria->estado_civil_id = $request->input('estado');
        $asesoria->nivel_ingresos_id = $request->input('nivel_ingresos');
        $asesoria->bono = $request->input('bono');
        $asesoria->discapacidad = $request->input('discapacidad');
        $asesoria->Zona_vive_id = $request->input('zona');
        
        //DATOS GENERALES
        $asesoria->cjga_id = $request->input('CJGA');
        $asesoria->mes = $request->input('mes');
        $asesoria->anio = $request->input('anio');
        $asesoria->provincia_id = $request->input('provincia');
        $asesoria->ciudad_id = $request->input('ciudad');
        $asesoria->nombres_abogado = $request->input('nombres_abogado');
        $asesoria->fecha_asesoria = $request->input('fecha_asesoria');
        $asesoria->linea_servicio_id = $request->input('linea_servicios');
        $asesoria->materias_id = $request->input('materia');
        $asesoria->servicio_id = $request->input('tema');
        $asesoria->tipo_usuario_id = $request->input('tipo_usuario');
        $asesoria->derivado_id = $request->input('derivado');
        $asesoria->estado_causa_id = $request->input('estado_causa');
        $asesoria->seguimiento = $request->input('seguimiento_causa');
        $asesoria->patrocinio = $request->input('patrocinio');
        $asesoria->observaciones = $request->input('observaciones');
        $asesoria->save();

        //ACTUALIZAR EN LA TABLA CLIENTE
        $cliente = Cliente::find($asesoria->cliente_id);
        $fechaNacimiento = $asesoria->fecha_nacimiento;
        $cliente->instruccion_id = $asesoria->instruccion_id;
        $cliente->ocupacion_id = $asesoria->ocupacion_id;
        $cliente->estado_civil_id = $asesoria->estado_civil_id;
        $cliente->nivel_ingresos_id = $asesoria->nivel_ingresos_id;
        $cliente->bono = $asesoria->bono;
        $cliente->discapacidad = $asesoria->discapacidad;
        $cliente->Zona_vive_id = $asesoria->Zona_vive_id;
        $cliente->update();

        //ACTUALIZAR EN LA TABLA PROFILE
        $profile = Profile::find($cliente->profiles->id);
        /* dd($profile);
        exit(0); */
        $profile->apellidos = $asesoria->apellidos;
        $profile->nombres = $asesoria->nombres;
        $profile->identificacion = $asesoria->identificacion;
        $profile->fecha_nacimiento = $fechaNacimiento;
        $profile->edad = $this->calcularEdad($fechaNacimiento);
        $profile->telefono = $asesoria->telefono;
        $profile->direccion = $asesoria->direccion;
        $profile->genero_id = $asesoria->genero_id;
        $profile->etnia_id = $asesoria->etnia_id;
        $profile->pais_id = $asesoria->pais_id;
        $profile->update();


        $notification = 'La Asesoria Ha sido Creado correctamente';

        return redirect('asesorias/'.$asesoria->cliente_id.'/show')->with(compact('notification')); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //dd($id);
       
       $cliente = Cliente::find($id);
       $asesorias = $cliente->asesorias;
       
       //dd($asesorias);
       return view('asesorias.show', compact(['asesorias', 'cliente']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $asesoria = Asesoria::find($id);
        $cjga = CJGA::all();
        $provincias = Provincias::all();
        $ciudades = Ciudades::all();
        $lineaServicios = Linea_servicios::all();
        $materias = Materias::all();
        $servicios = Servicios::all();
        $clientes = Cliente::all();
        $tipoUsuarios = Tipo_usuario::all();
        $derivados = Derivado::all();
        $estadosCausa = Estado_derivada::all();
        return view('asesorias.edit', compact(['asesoria', 'cjga', 'provincias', 'ciudades','lineaServicios', 'materias', 'servicios', 'clientes', 'tipoUsuarios', 'derivados', 'estadosCausa']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $asesoria = Asesoria::find($id);
        $asesoria->cjga_id = $request->input('CJGA');
        $asesoria->mes = $request->input('mes');
        $asesoria->anio = $request->input('anio');
        $asesoria->provincia_id = $request->input('provincias');
        $asesoria->ciudad_id = $request->input('ciudad');
        $asesoria->nombres_abogado = $request->input('nombres_abogado');
        $asesoria->fecha_asesoria = $request->input('fecha_asesoria');
        $asesoria->linea_servicio_id = $request->input('linea_servicios');
        $asesoria->materias_id = $request->input('materia');
        $asesoria->servicio_id = $request->input('tema');
//        $asesoria->cliente_id = $request->input('cliente');
        $asesoria->tipo_usuario_id = $request->input('tipo_usuario');
        $asesoria->derivado_id = $request->input('derivado');
        $asesoria->estado_causa_id = $request->input('estado_causa');
        $asesoria->seguimiento = $request->input('seguimiento_causa');
        $asesoria->patrocinio = $request->input('patrocinio');
        $asesoria->observaciones = $request->input('observaciones');
        $asesoria->update();
        $notification = 'La Asesoria Ha sido Actualizado correctamente';

        return redirect('asesorias/'.$asesoria->cliente_id.'/show')->with(compact('notification')); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
