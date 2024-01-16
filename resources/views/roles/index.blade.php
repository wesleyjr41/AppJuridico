@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Roles</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/role/create') }}" class="btn btn-sm btn-primary">Nuevo Role</a>
                </div>
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
                        <th scope="col">Id</th>
                        <th scope="col">Role</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <th scope="row">
                            {{ $role->rolid }}
                        </th>
                        <td>
                            {{ $role->nombre }}
                        </td>

                        <td>
                            <form action="{{ url('/role/'.$role->rolid) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <a href="{{ url('/roleModulo/'.$role->rolid.'/edit') }}" class="btn btn-sm btn-primary">Asignar Permisos</a>
                                <a href="{{ url('/role/'.$role->rolid.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                            
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
                    "sInfoEmpty": "0 al 0 de un total de 0 registros",
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
