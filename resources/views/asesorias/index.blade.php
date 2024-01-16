@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="ml-5 mt-3">
            <h1>Asesorias</h1>
        </div>
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col text-left">
                    <form action="{{ url('/search/asesorias') }}" method="POST">
                        @csrf

                        <div class="row py-2">
                            <div class="col-md-6">
                                <div class="input-group text-center">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" name="search" value="{{ isset($search) ? $search : '' }}"
                                        class="form-control col-sm-10" placeholder="Ingresar Número de Cédula"
                                        aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Buscar Asesoria</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>

        </div>
        
        <div class="col text-right">
            <a href="{{ url('/clientes') }}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar
            </a>

        </div>

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
                        <th scope="col">Id</th>
                        <th scope="col">CJGA</th>
                        <th scope="col">Mes y Año Informe</th>
                        <th scope="col">Linea de Sericio</th>
                        <th scope="col">Tema</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asesorias as $asesoria)
                        <tr>
                            <th scope="row">
                                {{ $asesoria->id }}
                            </th>
                            <td>
                                {{ $asesoria->cjga->name }}
                            </td>
                            <td>
                                {{ $asesoria->mes }}/{{ $asesoria->anio }}
                            </td>
                            <td>
                                {{ $asesoria->lineaServicios->nombre }}
                            </td>
                            <td>
                                {{ $asesoria->Servicios->nombre }}
                            </td>
                            <td>
                                {{ $asesoria->Clientes->profiles->nombres }}
                                {{ $asesoria->Clientes->profiles->apellidos }}
                            </td>

                            <td>
                                <a
                                    href="{{ url('/asesorias/' . $asesoria->id . '/edit') }}"class="btn btn-sm btn-primary">Editar</a>
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