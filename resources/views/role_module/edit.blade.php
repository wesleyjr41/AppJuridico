@extends('layouts.panel')

@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>Asignar Permisos al Role: <strong>{{ $role->nombre }}</strong></h3>
                <hr>
                <span>Todos los usuarios con este rol tendrán asignados los permisos que se seleccionen.</span>
                <div class="col text-right">
                    <a href="{{ url('/roles') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar
                    </a>

                </div>
                <div class="col-md-12 text-right">
                    <a href="javascript:void(0)" onclick="todos()" title="">Seleccionar Todos</a>
                    |
                    <a href="javascript:void(0)" onclick="ninguno()" title="">Ninguno</a>
                </div>
            </div>
        </div>
    </div>

    <form method="post" action="{{ url('/roleModulo/' . $role->rolid) }}" style="width: 100%">
        {{ csrf_field() }}

        @foreach ($modulos as $m)
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col align-self-center">
                                    {{ $m->nombre }}
                                </div>
                                <div class="col pl-2">
                                    @foreach ($m->modulopermiso()->get() as $mp)
                                        <?php $p = $mp->permisos()->first(); ?>
                                        <div class="ml-2">
                                            <input class="check" id="{{ $mp->modulopermisoid }}" name="permisos[]"
                                            value="{{ $mp->modulopermisoid }}" type="checkbox"
                                            {{ in_array($mp->modulopermisoid, $rmp) ? 'checked' : '' }}>
                                        <label for="{{ $mp->modulopermisoid }}">{{ $p->nombre }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-12 text-center">
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
        </div>
    </form>

@stop

@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        function todos() {
            $('.check').prop({
                checked: 'true',
            })
        }

        function ninguno() {
            $('.check').prop('checked', false)
        }
    </script>
@endsection
