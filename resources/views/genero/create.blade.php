@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo Genero</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/genero') }}" class="btn btn-sm btn-success">
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
            <form action="{{ url('/genero') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" >Nombre del genero</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Crear genero</button>
            </form>
        </div>
    </div>
    </div>
@endsection
