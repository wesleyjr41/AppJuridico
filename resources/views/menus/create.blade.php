@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo Menú</h3>
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
            <form action="{{ url('/menu') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name" >Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name" >orden</label>
                        <input type="number" name="orden" class="form-control" value="{{ old('orden') }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name" >Ruta</label>
                        <input type="text" name="ruta" class="form-control" value="{{ old('ruta') }}" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name" >Icono</label>
                        <input type="text" name="icono" class="form-control" value="{{ old('icono') }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="genero">Menu Principal</label>
                        <select name="padre" class="form-control">
                            <option value="">Root</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}"> {{ $menu->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Crear Menú</button>
            </form>
        </div>
    </div>
    </div>
@endsection
