@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Menú</h3>
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
            <form action="{{ url('/menu/'.$menu->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name" >Nombre del Menú</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $menu->nombre) }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name" >orden</label>
                        <input type="number" name="orden" class="form-control" value="{{ old('orden', $menu->orden) }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name" >Ruta</label>
                        <input type="text" name="ruta" class="form-control" value="{{ old('ruta', $menu->ruta) }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name" >Icono</label>
                        <input type="text" name="icono" class="form-control" value="{{ old('icono', $menu->icono) }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
    </div>
@endsection
