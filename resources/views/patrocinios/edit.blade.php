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
                    {{-- <h3 class="mb-0">Editar Asesoria {{$asesoria->cliente_id}}</h3> --}}
                </div>
                <div class="col text-right">
                    <a href="{{ url('/patrocinios/' . $patrocinio->asesoria->cliente_id . '/show/') }}" class="btn btn-sm btn-success">
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
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p><small>Judicalización</small></p>
                    </div>
                     <div class="stepwizard-step col-xs-3">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                        <p><small>Para el cierre del Caso</small></p>
                    </div>
                </div>
            </div>

            <form action="{{ url('patrocinios/'.$patrocinio->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-body">
                        <div class="row">
                            {{-- NOMBRE DEL ABOGADO --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Apellidos Y Nombres Abogado\a del Consultorio Juridico</label>
                                <input class="form-control" name="nombres_abogado" value="{{ old('nombres_abogado', $patrocinio->nombres_abogado) }}"
                                    type="text" required="required" />
                            </div>
                        </div>
                        <div class="row">
                            {{-- Fecha de Asignación de la Causa --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Fecha de Asignación de la Causa</label>
                                <input name="fecha_asignacion" value="{{ old('fecha_asignacion', $patrocinio->fecha_asignacion_causa) }}" maxlength="100"
                                    type="date" required="required" class="form-control" />
                            </div>
                            {{-- TIPO DE PATROCINIO --}}
                            <div class="form-group col-md-6">
                                <label for="tipoPatrocinio">Tipo de Patrocinio</label>
                                <select name="tipoPatrocinio" class="form-control" required>
                                    <option value="">Seleccionar Tipo de Patrocinio</option>
                                    @foreach ($tipoPatrocinio as $tP)
                                        <option value="{{ $tP->id }}"
                                            {{ $patrocinio->tipo_patrocinio_id == $tP->id ? 'selected' : '' }}>{{ $tP->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn pull-right mb-5" type="button">Siguiente</button>
                    </div>
                </div>
                <div class="panel panel-primary setup-content" id="step-2">
                    <div class="panel-body">
                        <div class="row">
                            {{-- TIPO DE JUDICATURA --}}
                            <div class="form-group col-md-6">
                                <label for="tipoJudicaura">Tipo de Judicatura</label>
                                <select name="tipoJudicaura" class="form-control" required>
                                    <option value="">Seleccionar Tipo de Judicatura</option>
                                    @foreach ($tipoJudicaura as $tJ)
                                        <option value="{{ $tJ->id }}" 
                                            {{ $patrocinio->tipo_judicatura_id == $tJ->id ? 'selected' : '' }}>{{ $tJ->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- UNIDAD JUDICIAL --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">No. Juzgado \ Unidad Judicial</label>
                                <input class="form-control" name="unidad_judicial" value="{{ old('unidad_judicial', $patrocinio->numero_juzgado) }}"
                                    type="number" required="required" />
                            </div>
                        </div>
                        <div class="row">
                            {{-- NOMBRE DEL JUEZ --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Nombre Del Juez</label>
                                <input class="form-control" name="nombre_juez" value="{{ old('nombre_juez', $patrocinio->nombre_juez) }}"
                                    type="text" required="required" />
                            </div>
                            {{-- No. de Causa --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">No. de Causa</label>
                                <input class="form-control" type="number" name="numero_causa"
                                    value="{{ old('numero_causa', $patrocinio->numero_causa) }}" required="required" />
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn pull-right mb-5" type="button">Siguiente</button>

                    </div>
                </div>
                <div class="panel panel-primary setup-content" id="step-3">
                    <div class="panel-body">
                        <div class="row">
                            {{-- Estado --}}
                            <div class="form-group col-md-6">
                                <label for="estado">Estado</label>
                                <select name="estado" class="form-control" required>
                                    <option value="">Seleccionar Estado</option>
                                    @foreach ($estados as $est)
                                        <option value="{{ $est->id }}" 
                                            {{ $patrocinio->estado_id == $est->id ? 'selected' : '' }}>{{ $est->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Resolución Judicial --}}
                            <div class="form-group col-md-6">
                                <label for="resolución_judicial">Resolución Judicial \ Sentencia</label>
                                <select name="resolución_judicial" class="form-control" required>
                                    <option value=""> </option>
                                    <option value="1" {{ $patrocinio->resolución_judicial == 1 ? 'selected' : '' }}>No</option>
                                    <option value="2" {{ $patrocinio->resolución_judicial == 2 ? 'selected' : '' }}>Si</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Fecha Resolución Judicial --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Fecha Resolución Judicial \ Sentencia</label>
                                <input class="form-control" name="fecha_resolucion" type="date"
                                    value="{{ old('fecha_resolucion', $patrocinio->fecha_resolucion) }}" required="required" />
                            </div>
                            {{-- OBSERVACIONES --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Observaciones</label>
                                <input class="form-control" name="observacion" value="{{ old('observacion', $patrocinio->observacion) }}"
                                    type="text" required="required" />
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
