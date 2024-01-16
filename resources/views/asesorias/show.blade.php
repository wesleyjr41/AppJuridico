@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="ml-5 mt-3">
            <h1>Asesorias de: <span><strong> {{$cliente->profiles->nombres}} {{$cliente->profiles->apellidos}}</strong> </span> </h1>
        </div>
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col text-left">
                    <a href="{{ url('/asesorias/'.$cliente->id .'/create') }}" class="btn btn-primary">Nueva Asesoria</a>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/clientes') }}" class="btn btn-success">
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
                            <th scope="col" class="text-center">CJGA</th>
                            <th scope="col">Mes y Año Informe</th>
                            <th scope="col">Linea de Sericio</th>
                            <th scope="col">Tema</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asesorias as $asesoria)
                            <tr>
                                <td>
                                    {{ $asesoria->cjga->name }}
                                </td>
                                <td class="text-center">
                                    {{ $asesoria->mes }}/{{ $asesoria->anio }}
                                </td>
                                <td>
                                    {{ $asesoria->lineaServicios->nombre }}
                                </td>
                                <td>
                                    {{ $asesoria->Servicios->nombre }}
                                </td>

                                <td>
                                    <a href="{{ url('/asesorias/' . $asesoria->id . '/edit') }}"class="btn btn-sm btn-primary">Editar</a>

                                    @if( DB::table('patrocinio')->where('asesoria_id', $asesoria->id )->exists())
                                        <a href="{{ url('/patrocinios/' . $asesoria->id . '/show') }}" class="btn btn-sm btn-info">Ver Patrocinios</a>
                                    @else
                                        <a href="{{ url('/patrocinios/' . $asesoria->id . '/create') }}"class="btn btn-sm btn-secondary">Crear Patrocinio</a>
                                    @endif
                                    
                                    
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
