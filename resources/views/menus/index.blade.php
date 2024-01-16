@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Menus</h3>
                </div>

                <div class="col text-right">
                    <a href="{{ url('/menu/create') }}" class="btn btn-sm btn-primary">Nuevo Menú</a>
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
                        <th scope="col">Nombre</th>
                        <th scope="col">orden</th>
                        <th scope="col">ruta</th>
                        <th scope="col">icono</th>
                        <th scope="col">Padre</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr>
                            <th scope="row">
                                {{ $menu->id }}
                            </th>
                            <td>
                                {{ $menu->nombre }}
                            </td>
                            <td>
                                {{ $menu->orden }}
                            </td>
                            <td>
                                {{ $menu->ruta }}
                            </td>
                            <td>
                                {{ $menu->icono }}
                            </td>

                            <td>
                                {{ $menu->menuPadre->nombre }}
                            </td>

                            <td>
                                
                                <form action="{{ url('/menu/' . $menu->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/menu_role/'.$menu->id.'/edit') }}"
                                        class="btn btn-sm btn-primary">Asignar</a>
                                    <a href="{{ url('/menu/' . $menu->id . '/edit') }}"
                                        class="btn btn-sm btn-primary">Editar</a>
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
