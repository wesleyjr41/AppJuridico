@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="ml-5 mt-3">
            <h1>Clientes</h1>
        </div>
        <div class="card-header border-0">
            <div class="row align-items-center">
                {{-- <div class="col text-left">
                    <form action="{{ url('/search') }}" method="POST">
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
                                <button class="btn btn-primary" type="submit">Buscar Cliente</button>
                            </div>
                        </div>
                    </form>
                </div> --}}
                
                {{-- @foreach ($permiso as $item)
                    @if ($item->permisoid == 2) --}}
                <div class="col text-right">
                    <a href="{{ url('/clientes/create') }}" class="btn btn-primary">Nuevo Cliente</a>
                </div>
                {{-- @endif
                @endforeach --}}
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
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Identificación</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>
                                    {{ $cliente->profiles->nombres }}
                                </td>
                                <td>
                                    {{ $cliente->profiles->apellidos }}
                                </td>
                                <td>
                                    {{ $cliente->profiles->identificacion }}
                                </td>
                                <td>
                                    {{ $cliente->profiles->telefono }}
                                </td>

                                <td>
                                    {{-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-placement="top" title="Ver"  data-target="#exampleModal{{$cliente->id}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>  --}}
                                    <a data-placement="top" title="Más Información"
                                        href="{{ url('/clientes/' . $cliente->id . '/edit') }}"
                                        class="btn btn-sm btn-primary"><i class="ni ni-single-copy-04"></i></a>
                                    <a data-placement="top" title="Asesorias"
                                        href="{{ url('/asesorias/' . $cliente->id . '/show') }}"
                                        class="btn btn-sm btn-default">Asesorias</a>
                                </td>
                                @include('modal.edit')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @livewire('view-client')
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
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

        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('.modal-title')
            var modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = 'New message to ' + recipient
            modalBodyInput.value = recipient
        });
    </script>
@endsection
