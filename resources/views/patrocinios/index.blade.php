@extends('layouts.panel')


@section('content')
    <div class="card shadow">
        <div class="ml-5 mt-3 text-center">
            <h1>Patrocinios</h1>
        </div>
        <div class="card-header border-0">
            {{-- <div class="row align-items-center">
                <div class="col text-left">
                    <form action="{{ url('/search/patrocinios') }}" method="POST">
                        @csrf

                        <div class="row py-2">
                            <div class="col-md-6">
                                <div class="input-group text-center">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" name="search" value="{{ isset($search) ? $search : '' }}"
                                        class="form-control col-sm-10" placeholder="Buscar" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Buscar Patrocinios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
            {{-- <div class="col text-right">
                <a href="{{ url('/clientes') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-chevron-left"></i>
                    Regresar
                </a>

            </div> --}}


            <div class="card-body">
                @if (session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif
            </div>

            <div class="table-responsive p-2">
                <!-- Projects table -->
                <table id="miTabla" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="text-center">Nombres y Apellidos Abogado\a</th>
                            <th scope="col">Fecha de Asignación de la Causa</th>
                            <th scope="col">Linea de Sericio</th>
                            <th scope="col">Materia</th>
                            <th scope="col" class="text-center">Tema</th>
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
                        @foreach ($patrocinios as $patrocinio)
                            <tr>
                                <td>
                                    {{ $patrocinio->nombres_abogado }}
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
                                    {{ $patrocinio->asesoria->apellidos ?? '' }}
                                    {{ $patrocinio->asesoria->nombres ?? '' }}
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
                                    <a
                                        href="{{ url('/patrocinios/' . $patrocinio->id . '/edit') }}"class="btn btn-sm btn-primary">Editar</a>
                                    {{-- <a href="{{ url('/patrocionios/' . $asesoria->id . '/create') }}"class="btn btn-sm btn-secondary">Patrocinios</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "_START_ al _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });
    </script>
@endsection
