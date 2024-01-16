@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="ml-5 mt-3">
         <h1>Patrocinio de: <span><strong> {{ $patrocinio->asesoria->apellidos  ?? '' }} {{ $patrocinio->asesoria->nombres  ?? '' }}</strong></span></h1> 
        </div>
        <div class="card-header border-0">
            <div class="row align-items-center">
                {{-- <div class="col text-left">

                    <a href="{{ url('/patrocinios/'.$asesoria->id.'/create') }}" class="btn btn-primary">Nuevo Patrocinio</a> 
                </div> --}}
                <div class="col text-right">
                    <a href="{{ url('/asesorias/'.$asesoria->cliente_id.'/show') }}" class="btn btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar
                    </a>

                </div>
            </div>

            <div class="card-body">
                @if (session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="text-center">Nombres y Apellidos Abogado\a</th>
                            <th scope="col">Fecha de Asignación de la Causa</th>
                            <th scope="col">Linea de Sericio</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Tema</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Apellidos y nombres del Usuario</th>
                            <th scope="col">nº telefono</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Ocupacion</th>
                            <th scope="col">Tipo de Usuario</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <td>
                                    {{ $patrocinio->nombres_abogado ?? ''}}
                                </td>
                                <td class="text-center">
                                    {{ $patrocinio->fecha_asignacion_causa ?? '' }}
                                </td>
                                <td>
                                    {{ $patrocinio->asesoria->lineaServicios->nombre ?? '' }}
                                </td>
                                <td>
                                    {{ $patrocinio->asesoria->materias->nombre ?? '' }}
                                </td>
                                <td>
                                    {{ $patrocinio->asesoria->servicios->nombre ?? '' }}
                                </td>
                                <td>
                                    {{ $patrocinio->asesoria->identificacion ?? '' }}
                                </td>
                                <td>
                                    {{ $patrocinio->asesoria->apellidos  ?? '' }} {{ $patrocinio->asesoria->nombres  ?? '' }}
                                </td>
                                <td>
                                    {{ $patrocinio->asesoria->telefono ?? '' }}
                                </td>
                                <td>
                                    {{ $patrocinio->asesoria->genero->name ?? '' }}

                                </td>
                                <td>
                                    {{ $patrocinio->asesoria->ocupacion->nombre ?? '' }}
                                    
                                </td>
                                <td>
                                    {{ $patrocinio->asesoria->TipoUsuario->nombre ?? '' }}
                                    
                                </td>

                                <td>
                                    <a href="{{ url('/patrocinios/' . $patrocinio->id . '/edit') }}"class="btn btn-sm btn-primary">Editar</a>
                                    {{-- <a href="{{ url('/patrocionios/' . $asesoria->id . '/create') }}"class="btn btn-sm btn-secondary">Patrocinios</a> --}}
                                </td>
                            </tr>
                      

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
