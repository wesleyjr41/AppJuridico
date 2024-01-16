@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Paises</h3>
                </div>
                @foreach ($permiso as $item)
                    @if ($item->permisoid == 2)
                        <div class="col text-right">
                            <a href="{{ url('/pais/create') }}" class="btn btn-sm btn-primary">Nuevo País</a>
                        </div>
                    @endif
                @endforeach
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
                        <th scope="col">Name</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paises as $pais)
                        <tr>
                            <th scope="row">
                                {{ $pais->id }}
                            </th>
                            <td>
                                {{ $pais->name }}
                            </td>

                            <td>
                                <form action="{{ url('/pais/' . $pais->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ url('/pais/' . $pais->id . '/edit') }}"
                                        class="btn btn-sm btn-primary">Editar</a>
                                    @foreach ($permiso as $item)
                                        @if ($item->permisoid == 4)
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        @endif
                                    @endforeach
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
