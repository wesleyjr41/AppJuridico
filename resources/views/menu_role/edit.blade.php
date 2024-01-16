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
                    <h3 class="mb-0">Asignar Menu al Role: <p class="text-primary"></p> </h3>
                    <p></p>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/menus') }}" class="btn btn-sm btn-success">
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
            
            <form action="{{ url('/menu_role/'.$menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select name="roles[]" class="form-control selectpicker" id="roles" data-style="btn-primary" title="Seleccionar Roles" multiple required>
                      @foreach ($roles as $role)
                      
                        <option value="{{ $role->rolid }}">{{ $role->nombre }}</option>
                      @endforeach
                    </select>
                  </div>
                {{-- <div class="form-group">
                    <label for="name" >Role</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $permiso->nombre) }}" required>
                </div> --}}
                <button type="submit" class="btn btn-primary">Guardar</button>
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
        $('#roles').selectpicker('val', @json($role_ids) );
    </script>
@endsection