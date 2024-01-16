@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Resetear Contraseña a: <span><strong>{{$usuario->name}}</strong></span> </h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/usuarios') }}" class="btn btn-sm btn-success">
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
            @if (session('notification'))
            <div class="alert alert-success" role="alert">
                {{ session('notification') }}
            </div>
        @endif
            <form action="{{ url('/changePassword/' . $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input id="password" value="{{old('password')}}" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Ingresar Contraseña">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="checkbox" class="mt-2" id="mostrarContrasena">
                        <label for="mostrarContrasena">Mostrar Contraseña</label>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" value="{{old('password_confirmation')}}" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password_confirmation" required autocomplete="current-password"
                            placeholder="Ingresar Nuevamente Contraseña">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
            </form>
        </div>
    </div>
    </div>
@endsection


@section('scripts')
    <script>
        document.getElementById('mostrarContrasena').addEventListener('change', function() {
            var passwordInput = document.getElementById('password');
            passwordInput.type = this.checked ? 'text' : 'password';

            var passwordInput = document.getElementById('password_confirmation');
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
@endsection
