@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Etnias</h3>
                </div>
                @foreach ($permiso as $item)
                    @if ($item->permisoid == 2)
                        <div class="col text-right">
                            <a href="{{ url('/etnia/create') }}" class="btn btn-sm btn-primary">Nueva Etnia</a>
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etnias as $etnia)
                        <tr>
                            <th scope="row">
                                {{ $etnia->id }}
                            </th>
                            <td>
                                {{ $etnia->name }}
                            </td>

                            <td>

                                <form action="{{ url('/etnia/' . $etnia->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ url('/etnia/' . $etnia->id . '/edit') }}"
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
