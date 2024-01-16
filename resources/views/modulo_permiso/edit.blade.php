@extends('layouts.panel')

@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Asignar Permisos al Modulo: <p class="text-primary"></p> {{ $modulo->nombre }} </h3>
                    <p></p>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/modulos') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar
                    </a>

                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Por Favor!</strong> {{ $error }}
                    </div>
                @endforeach
            @endif


            <form action="{{ url('/moduloPermiso/'.$modulo->moduloid) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card" style="width: 25rem; margin-left: 5px;">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                        <div class="form-group">
                            <label for="permisos">Permisos</label>
                            <select name="permisos[]" class="form-control selectpicker" id="permisos"
                                data-style="btn-primary" title="Seleccionar Permisos" multiple required>
                                @foreach ($permisos as $permiso)

                                    <option value="{{ $permiso->permisoid }}">{{ $permiso->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>

                        </p>

                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        $(document).ready(()=> {});
        $('#permisos').selectpicker('val', @json($permiso_ids) );
    </script>
@endsection
