<?php

namespace App\Http\Controllers;

use App\Models\Asesoria;
use App\Models\Estado;
use App\Models\Servicios;
use App\Models\Estado_derivada;
use App\Models\Linea_servicios;
use App\Models\Patrocinio;
use App\Models\Tipo_judicatura;
use App\Models\Tipo_patrocinio;
use Illuminate\Http\Request;

class PatrocinioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search'); // Puedes cambiar el nombre según lo que estés utilizando
        $patrocinio = new Patrocinio();

        $patrocinio_id = Patrocinio::join('asesorias', 'asesorias.id', '=', 'patrocinio.asesoria_id')
        ->join('clientes', 'clientes.id', '=', 'asesorias.cliente_id')
        ->join('profiles', 'profiles.id', '=', 'clientes.profile_id')
        ->join('tipo_judicatura', 'tipo_judicatura.id', '=', 'patrocinio.tipo_judicatura_id')
        ->select('patrocinio.id')
        ->where('profiles.nombres', 'like', "%$search%")
        ->orWhere('profiles.apellidos', 'like', "%$search%")
        ->orWhere('profiles.identificacion', 'like', "%$search%")
        ->orWhere('patrocinio.nombres_abogado', 'like', "%$search%")
        ->orWhere('tipo_judicatura.nombre', 'like', "%$search%")
        ->groupBy('patrocinio.id')
        ->get();
        
        $patrocinios = Patrocinio::find($patrocinio_id);

    return view('patrocinios.index', compact('patrocinios'));
        
    }

    public function index()
    {
        $patrocinios = Patrocinio::all();
        //dd($patrocinios);
        return view('patrocinios.index', compact('patrocinios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        $asesoria = Asesoria::find($id);        
        $lineaServicios = Linea_servicios::all();
        $servicios = Servicios::all();
        $estadosCausa = Estado_derivada::all();
        $tipoPatrocinio = Tipo_patrocinio::all();
        $tipoJudicaura = Tipo_judicatura::all();
        $estados = Estado::all();
        //dd($asesoria);
        return view('patrocinios.create', 
            compact([
                'asesoria',
                'tipoPatrocinio',
                'lineaServicios',
                'servicios',
                'estadosCausa',
                'tipoJudicaura',
                'estados'])
            );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, )
    {
        $rules = [
            'asesoria_id' => 'required',
            'nombres_abogado' => 'required|max:50',
            'fecha_asignacion' => 'required|date',
            'tipoPatrocinio' => 'required',
            'tipoJudicaura' => 'required',
            'unidad_judicial' => 'required|max:50',
            'nombre_juez' => 'required|max:50',
            'numero_causa' => 'required',
            /* 'ultima_actividad' => 'required|max:50',
            'fecha_ultima_actividad' => 'required|date', */
            'estado' => 'required',
            'resolución_judicial' => 'required',
            'fecha_resolucion' => 'required|date',
            'observacion' => 'required|max:50',
        ];

        $messages = [
            'nombres_abogado.required' => 'EL nombre del abogado es obligatorio.',
            'fecha_asignacion.required' => 'La Fecha de Asignación de la Causa es obligatorio.',
            'tipoPatrocinio.required' => 'El Tipo de Patrocinio es obligatorio.',
            'tipoJudicaura.required' => 'El Tipo de Judicatura es obligatorio.',
            'unidad_judicial.required' => 'El No. Juzgado \ Unidad Judicial es obligatorio.',
            'nombre_juez.required' => 'El Nombre del Juez es obligatorio.',
            'numero_causa.required' => 'El No. de Causa es obligatorio.',
            /* 'ultima_actividad.required' => 'La última actividad o diligencia realizada por el abogado del CJGA es obligatorio.',
            'fecha_ultima_actividad.required' => 'La Fecha de la última acrividad o diligencia realizada es obligatorio.', */
            'estado.required' => 'El Estado es obligatorio.',
            'resolución_judicial.required' => 'La Resolución Judicial \ Sentencia es obligatorio.',
            'fecha_resolucion.required' => 'La Fecha Resolución Judicial \ Sentenci es obligatorio.',
            'Observaciones' => 'Las Observaciones son obligatorio.',
        ];


        $this->validate($request, $rules, $messages);

        $patrocinio = new Patrocinio();
        $patrocinio->asesoria_id = $request->input('asesoria_id');
        $patrocinio->fecha_asignacion_causa = $request->input('fecha_asignacion');
        $patrocinio->nombres_abogado = $request->input('nombres_abogado');
        $patrocinio->tipo_patrocinio_id = $request->input('tipoPatrocinio');
        $patrocinio->tipo_judicatura_id = $request->input('tipoJudicaura');
        $patrocinio->numero_juzgado = $request->input('unidad_judicial');
        $patrocinio->nombre_juez = $request->input('nombre_juez');
        $patrocinio->numero_causa = $request->input('numero_causa');
       /*  $patrocinio->ultima_actividad = $request->input('ultima_actividad');
        $patrocinio->fecha_ultima_actividad = $request->input('fecha_ultima_actividad'); */
        $patrocinio->estado_id = $request->input('estado');
        $patrocinio->resolución_judicial = $request->input('resolución_judicial');
        $patrocinio->fecha_resolucion = $request->input('fecha_resolucion');
        $patrocinio->observacion = $request->input('observacion');
        $patrocinio->save();


        $notification = 'La Asesoria Ha sido Creado correctamente';

        return redirect('patrocinios/'.$patrocinio->asesoria_id.'/show')->with(compact('notification')); 

        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $asesoria = Asesoria::findOrFail($id);
        $patrocinio = Patrocinio::where('asesoria_id', $id)->first();
        //dd($patrocinio);

        return view('patrocinios.show', compact(['patrocinio', 'asesoria']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patrocinio = Patrocinio::find($id);
        $asesoria = Asesoria::find($id);        
        $lineaServicios = Linea_servicios::all();
        $servicios = Servicios::all();
        $estadosCausa = Estado_derivada::all();
        $tipoPatrocinio = Tipo_patrocinio::all();
        $tipoJudicaura = Tipo_judicatura::all();
        $estados = Estado::all();
        //dd($asesoria);
        return view('patrocinios.edit', 
            compact([
                'asesoria',
                'patrocinio',
                'tipoPatrocinio',
                'lineaServicios',
                'servicios',
                'estadosCausa',
                'tipoJudicaura',
                'estados'])
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nombres_abogado' => 'required|max:50',
            'fecha_asignacion' => 'required|date',
            'tipoPatrocinio' => 'required',
            'tipoJudicaura' => 'required',
            'unidad_judicial' => 'required|max:50',
            'nombre_juez' => 'required|max:50',
            'numero_causa' => 'required',
            'estado' => 'required',
            'resolución_judicial' => 'required',
            'fecha_resolucion' => 'required|date',
            'observacion' => 'required|max:50',
        ];

        $messages = [
            'nombres_abogado.required' => 'EL nombre del abogado es obligatorio.',
            'fecha_asignacion.required' => 'La Fecha de Asignación de la Causa es obligatorio.',
            'tipoPatrocinio.required' => 'El Tipo de Patrocinio es obligatorio.',
            'tipoJudicaura.required' => 'El Tipo de Judicatura es obligatorio.',
            'unidad_judicial.required' => 'El No. Juzgado \ Unidad Judicial es obligatorio.',
            'nombre_juez.required' => 'El Nombre del Juez es obligatorio.',
            'numero_causa.required' => 'El No. de Causa es obligatorio.',
            'estado.required' => 'El Estado es obligatorio.',
            'resolución_judicial.required' => 'La Resolución Judicial \ Sentencia es obligatorio.',
            'fecha_resolucion.required' => 'La Fecha Resolución Judicial \ Sentenci es obligatorio.',
            'Observaciones' => 'Las Observaciones son obligatorio.',
        ];


        $this->validate($request, $rules, $messages);

        $patrocinio = Patrocinio::find($id);
        $patrocinio->fecha_asignacion_causa = $request->input('fecha_asignacion');
        $patrocinio->nombres_abogado = $request->input('nombres_abogado');
        $patrocinio->tipo_patrocinio_id = $request->input('tipoPatrocinio');
        $patrocinio->tipo_judicatura_id = $request->input('tipoJudicaura');
        $patrocinio->numero_juzgado = $request->input('unidad_judicial');
        $patrocinio->nombre_juez = $request->input('nombre_juez');
        $patrocinio->numero_causa = $request->input('numero_causa');
        $patrocinio->estado_id = $request->input('estado');
        $patrocinio->resolución_judicial = $request->input('resolución_judicial');
        $patrocinio->fecha_resolucion = $request->input('fecha_resolucion');
        $patrocinio->observacion = $request->input('observacion');
        $patrocinio->update();


        $notification = 'La Asesoria Ha sido Actualizada correctamente';

        return redirect('patrocinios/'.$patrocinio->asesoria_id.'/show')->with(compact('notification')); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
