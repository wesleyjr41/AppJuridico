@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Modulos</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/modulo/create') }}" class="btn btn-sm btn-primary">Nuevo Modulo</a>
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
                        <th scope="col">Modulo</th>
                        <th scope="col">Ruta</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($modulos as $modulo)
                    <tr>
                        <th scope="row">
                            {{ $modulo->moduloid }}
                        </th>
                        <td>
                            {{ $modulo->nombre }}
                        </td>
                        <td>
                            {{ $modulo->ruta }}
                        </td>

                        <td>
                            <form action="{{ url('/modulo/'.$modulo->moduloid) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ url('/moduloPermiso/'.$modulo->moduloid.'/edit') }}" class="btn btn-sm btn-secondary">Asignar Permisos</a>
                                <a href="{{ url('/modulo/'.$modulo->moduloid.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
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
