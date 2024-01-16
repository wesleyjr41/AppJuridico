@extends('layouts.panel')

@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/stepper.css') }}">
@endsection


@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Asesoria {{$asesoria->cliente_id}}</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/asesorias/'.$asesoria->cliente_id.'/show/') }}" class="btn btn-sm btn-success">
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
        </div>
        <div class="container">
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step col-xs-3">
                        <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                        <p><small>Datos Generales</small></p>
                    </div>
                    <div class="stepwizard-step col-xs-3">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p><small>Información Final</small></p>
                    </div>
                    {{-- <div class="stepwizard-step col-xs-3">
                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                        <p><small>Cargo</small></p>
                    </div> --}}
                </div>
            </div>

            <form action="{{ url('asesorias/'.$asesoria->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-body">
                        <div class="row">
                            {{-- CJGA --}}
                            <div class="form-group col-md-3">
                                <label for="CJGA">CJG</label>
                                <select name="CJGA" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($cjga as $cj)
                                        <option value="{{ $cj->id }}"
                                            {{ $asesoria->cjga_id == $cj->id ? 'selected' : '' }}>{{ $cj->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- mes --}}
                            <div class="form-group col-md-3">
                                <label for="mes">Mes Informe</label>
                                <select name="mes" class="form-control" required>
                                    <option value=""> </option>
                                    <option value="Enero" {{ $asesoria->mes == 'Enero' ? 'selected' : '' }}>Enero</option>
                                    <option value="Febrero" {{ $asesoria->mes == 'Febrero' ? 'selected' : '' }}>Febrero
                                    </option>
                                    <option value="Marzo" {{ $asesoria->mes == 'Marzo' ? 'selected' : '' }}>Marzo</option>
                                    <option value="Abril" {{ $asesoria->mes == 'Abril' ? 'selected' : '' }}>Abril</option>
                                    <option value="Mayo" {{ $asesoria->mes == 'Mayo' ? 'selected' : '' }}>Mayo</option>
                                    <option value="Junio" {{ $asesoria->mes == 'Junio' ? 'selected' : '' }}>Junio</option>
                                    <option value="Julio" {{ $asesoria->mes == 'Julio' ? 'selected' : '' }}>Julio</option>
                                    <option value="Agosto" {{ $asesoria->mes == 'Agosto' ? 'selected' : '' }}>Agosto
                                    </option>
                                    <option value="Septiembre" {{ $asesoria->mes == 'Septiembre' ? 'selected' : '' }}>
                                        Septiembre</option>
                                    <option value="Octubre" {{ $asesoria->mes == 'Octubre' ? 'selected' : '' }}>Octubre
                                    </option>
                                    <option value="Noviembre" {{ $asesoria->mes == 'Noviembre' ? 'selected' : '' }}>
                                        Noviembre</option>
                                    <option value="Diciembre" {{ $asesoria->mes == 'Diciembre' ? 'selected' : '' }}>
                                        Diciembre</option>
                                </select>
                            </div>
                            {{-- anio --}}
                            <div class="form-group col-md-3">
                                <label for="anio" class="control-label">Año Informe</label>
                                <input name="anio" class="form-control" type="number" min="1900" max="2099"
                                    step="1" value="{{ old('anio', $asesoria->anio) }}" />
                            </div>
                            {{-- provincias --}}
                            <div class="form-group col-md-3">
                                <label for="provincias">Provincia</label>
                                <select name="provincias" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($provincias as $prov)
                                        <option value="{{ $prov->id }}"
                                            {{ $asesoria->provincia_id == $prov->id ? 'selected' : '' }}>
                                            {{ $prov->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- ciudad --}}
                            <div class="form-group col-md-3">
                                <label for="ciudad">Ciudad</label>
                                <select name="ciudad" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($ciudades as $city)
                                        <option value="{{ $city->id }}"
                                            {{ $asesoria->ciudad_id == $city->id ? 'selected' : '' }}>{{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- nombres_abogado --}}
                            <div class="form-group col-md-3">
                                <label for="nombres_abogado">Abogado\a del Consultorio</label>
                                <input name="nombres_abogado" maxlength="10" type="text" required="required"
                                    class="form-control" placeholder="Ingresar Apellidos y Nombres"
                                    value="{{ old('nombres_abogado', $asesoria->nombres_abogado) }}" />
                            </div>
                            {{-- fecha_asesoria --}}
                            <div class="form-group col-md-3">
                                <label for="fecha_asesoria" class="control-label">Fecha de la Asesoria</label>
                                <input name="fecha_asesoria" class="form-control" type="date"
                                    value="{{ old('fecha_asesoria', $asesoria->fecha_asesoria) }}" />
                            </div>
                            {{-- materia --}}
                            <div class="form-group col-md-3">
                                <label for="materia">Materia</label>
                                <select name="materia" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($materias as $materia)
                                        <option value="{{ $materia->id }}"
                                            {{ $asesoria->materias_id == $materia->id ? 'selected' : '' }}>
                                            {{ $materia->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- materia --}}
                            <div class="form-group col-md-3">
                                <label for="linea_servicios">Línea de Servicio</label>
                                <select name="linea_servicios" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($lineaServicios as $lS)
                                        <option value="{{ $lS->id }}"
                                            {{ $asesoria->linea_servicio_id == $lS->id ? 'selected' : '' }}>
                                            {{ $lS->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- tema --}}
                            <div class="form-group col-md-3">
                                <label for="tema">Tema</label>
                                <select name="tema" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($servicios as $sevicio)
                                        <option value="{{ $sevicio->id }}"
                                            {{ $asesoria->servicio_id == $sevicio->id ? 'selected' : '' }}>
                                            {{ $sevicio->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn pull-right mb-5" type="button">Siguiente</button>
                    </div>
                </div>
                <div class="panel panel-primary setup-content" id="step-3">
                    <div class="panel-body">
                        <div class="row">
                            {{-- tipo_usuario --}}
                            <div class="form-group col-md-3">
                                <label for="tipo_usuario">Tipo de Usuario:</label>
                                <select name="tipo_usuario" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($tipoUsuarios as $tipoU)
                                        <option value="{{ $tipoU->id }}"
                                            {{ $asesoria->tipo_usuario_id == $tipoU->id ? 'selected' : '' }}>
                                            {{ $tipoU->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- derivado --}}
                            <div class="form-group col-md-3">
                                <label for="derivado">Derivado por:</label>
                                <select name="derivado" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($derivados as $deri)
                                        <option value="{{ $deri->id }}"
                                            {{ $asesoria->derivado_id == $deri->id ? 'selected' : '' }}>
                                            {{ $deri->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- estado_causa --}}
                            <div class="form-group col-md-3">
                                <label for="estado_causa">Estado de la causa derivada por:</label>
                                <select name="estado_causa" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($estadosCausa as $estC)
                                        <option value="{{ $estC->id }}"
                                            {{ $asesoria->estado_causa_id == $estC->id ? 'selected' : '' }}>
                                            {{ $estC->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- seguimiento --}}
                            <div class="form-group col-md-3">
                                <label for="seguimiento_causa">Seguimiento de la causa derivada:</label>
                                <select name="seguimiento_causa" class="form-control" required>
                                    <option value=""> </option>
                                    <option value="1" {{ $asesoria->seguimiento == 1 ? 'selected' : '' }}>Si</option>
                                    <option value="2" {{ $asesoria->seguimiento == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            {{-- patrocinio --}}
                            <div class="form-group col-md-3">
                                <label for="patrocinio">Se convirtió en Patrocinio:</label>
                                <select name="patrocinio" class="form-control" required>
                                    <option value=""> </option>
                                    <option value="1" {{ $asesoria->patrocinio == 1 ? 'selected' : '' }}>Si</option>
                                    <option value="2" {{ $asesoria->patrocinio == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            {{-- observaciones --}}
                            <div class="form-group col-md-3">
                                <label for="observaciones" class="control-label">Observaciones</label>
                                <input name="observaciones" value="{{ old('observacion',$asesoria->observaciones ) }}" maxlength="10"
                                    type="text" required="required" class="form-control"
                                    placeholder="Observaciones" />
                            </div>
                        </div>
                        <button class="btn btn-success pull-right" type="submit">Guardar</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        $(document).ready(function() {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function(e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-success').addClass('btn-default');
                    $item.addClass('btn-success');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function() {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next()
                    .children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-success').trigger('click');
        });
    </script>
@endsection
