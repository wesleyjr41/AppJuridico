@extends('layouts.panel')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/stepper.css') }}">
@endsection


@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Patrocinio: <span><strong>{{ $asesoria->nombres }}
                                {{ $asesoria->apellidos }}</strong></span> </h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/asesorias/'.$asesoria->cliente_id.'/show') }}" class="btn btn-sm btn-success">
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
                        <a href="#step-1" type="button" class="btn btn-success btn-circle" disabled="disabled">1</a>
                        <p><small>Datos del Cliente</small></p>
                    </div>
                    <div class="stepwizard-step col-xs-3">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p><small>Datos de la Asesoria</small></p>
                    </div>

                    <div class="stepwizard-step col-xs-3">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                        <p><small>Datos Del Patrocinio</small></p>
                    </div>
                    {{-- <div class="stepwizard-step col-xs-3">
                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                        <p><small>Cargo</small></p>
                    </div> --}}
                </div>
            </div>

            <form action="{{ url('/patrocinios') }}" method="POST">
                @csrf

                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-body">
                        <div class="row">
                            <input name="asesoria_id" value="{{ $asesoria->id }}" type="hidden" required="required" />
                            {{-- APELLIDOS --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Apellidos</label>
                                <input class="form-control" value="{{ $asesoria->apellidos }}" disabled/>
                            </div>
                            {{-- NOMBRES --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Nombres</label>
                                <input class="form-control" value="{{ $asesoria->nombres }}" disabled/>
                            </div>
                        </div>
                        <div class="row">
                            {{-- IDENTIFICACION --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Nº Cédula</label>
                                <input class="form-control" value="{{ $asesoria->identificacion }}" disabled/>
                            </div>
                            {{-- FECHA DE NACIMIENTO --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Fecha de Nacimiento</label>
                                <input class="form-control" type="date" value="{{ $asesoria->fecha_nacimiento }}" disabled/>
                            </div>
                        </div>
                        <div class="row">
                            {{-- direccion --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Dirección</label>
                                <input class="form-control" value="{{ $asesoria->direccion }}" disabled/>
                            </div>
                            {{-- GENERO --}}
                            <div class="form-group col-md-6">
                                <label for="gender">Genero</label>
                                <input class="form-control" value="{{ $asesoria->genero->name }}" disabled/>
                            </div>
                        </div>
                        <div class="row">
                            {{-- PAIS DE ORIGEN --}}
                            <div class="form-group col-md-6">
                                <label for="country">País de Origen</label>
                                <input class="form-control" value="{{ $asesoria->pais->name }}" disabled/>
                            </div>
                            {{-- etnia --}}
                            <div class="form-group col-md-6">
                                <label for="ethnicity">Etnía</label>
                                <input class="form-control" value="{{ $asesoria->etnia->name }}" disabled/>
                            </div>
                        </div>
                        <div class="row">
                            {{-- instruccion --}}
                            <div class="form-group col-md-6">
                                <label for="instruction">Instrucción</label>
                                <input class="form-control" value="{{ $asesoria->instruccion->nombre }}" disabled/>
                            </div>
                            {{-- ocupacion --}}
                            <div class="form-group col-md-6">
                                <label for="ocupation">Ocupación</label>
                                <input class="form-control" value="{{ $asesoria->ocupacion->nombre }}" disabled/>
                            </div>
                        </div>
                        <div class="row">
                            {{-- estado Civil --}}
                            <div class="form-group col-md-6">
                                <label for="state">Estado Civil</label>
                                <input class="form-control" value="{{ $asesoria->estadoCivil->nombre }}" disabled/>
                            </div>
                            {{-- nivel_ingresos --}}
                            <div class="form-group col-md-6">
                                <label for="level">Nivel de Ingresos</label>
                                <input class="form-control" value="{{ $asesoria->nivelIngresos->nombre }}" disabled/>
                            </div>
                        </div>
                        <div class="row">
                            {{-- zona --}}
                            <div class="form-group col-md-6">
                                <label for="zona">Zona en la que Vive</label>
                                <input class="form-control" value="{{ $asesoria->zona->nombre }}" disabled/>
                            </div>
                            {{-- telefono --}}
                            <div class="form-group col-md-6">
                                <label for="telefono" class="control-label">Telefono</label>
                                <input class="form-control" value="{{ $asesoria->telefono }}"  disabled/>
                            </div>
                        </div>
                        <div class="row">
                            {{-- discapacidad --}}
                            <div class="form-group col-md-6">
                                <label for="discapacidad">Discapacidad</label>
                                <select name="discapacidad" class="form-control" disabled>
                                    <option value=""> </option>
                                    <option value="{{ $asesoria->discapacidad }}"
                                        {{ $asesoria->discapacidad == 2 ? 'selected' : '' }}>No</option>
                                    <option value="{{ $asesoria->discapacidad }}"
                                        {{ $asesoria->discapacidad == 1 ? 'selected' : '' }}>Si</option>
                                </select>
                            </div>
                            {{-- bono --}}
                            <div class="form-group col-md-6">
                                <label for="bono">Recibe Bono:</label>
                                <select name="bono" class="form-control" disabled>
                                    <option value=""> </option>
                                    <option value="{{ $asesoria->bono }}" {{ $asesoria->bono == 2 ? 'selected' : '' }}>
                                        No
                                    </option>
                                    <option value="{{ $asesoria->bono }}" {{ $asesoria->bono == 1 ? 'selected' : '' }}>
                                        Si
                                    </option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn pull-right mb-5" type="button">Siguiente</button>
                    </div>
                </div>
                <div class="panel panel-primary setup-content" id="step-2">
                    <div class="panel-body">
                        {{-- CJGA --}}
                        <div class="form-group">
                            <label for="CJGA">CJG</label>
                            <input class="form-control" value="{{ $asesoria->cjga->name }}"  disabled/>
                        </div>
                        <div class="row">
                            {{-- MES iNFORME --}}
                            <div class="form-group col-md-6">
                                <label for="mes">Mes Informe</label>
                                <select class="form-control" disabled>
                                    <option value=""> </option>
                                    <option value="Enero" {{ $asesoria->mes == 'Enero' ? 'selected' : '' }}>Enero</option>
                                    <option value="Febrero" {{ $asesoria->mes == 'Febrero' ? 'selected' : '' }}>Febrero
                                    </option>
                                    <option value="Marzo" {{ $asesoria->mes == 'Marzo' ? 'selected' : '' }}>Marzo
                                    </option>
                                    <option value="Abril" {{ $asesoria->mes == 'Abril' ? 'selected' : '' }}>Abril
                                    </option>
                                    <option value="Mayo" {{ $asesoria->mes == 'Mayo' ? 'selected' : '' }}>Mayo</option>
                                    <option value="Junio" {{ $asesoria->mes == 'Junio' ? 'selected' : '' }}>Junio
                                    </option>
                                    <option value="Julio" {{ $asesoria->mes == 'Julio' ? 'selected' : '' }}>Julio
                                    </option>
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
                            {{-- AÑO iNFORME --}}
                            <div class="form-group col-md-6">
                                <label class="control-label" for="anio">Año Informe</label>
                                <input class="form-control" value="{{ $asesoria->anio }}" disabled/>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Provincia --}}
                            <div class="form-group col-md-6">
                                <label for="status">Provincia</label>
                                <input class="form-control" value="{{ $asesoria->provincia->name }}" disabled/>
                            </div>
                            {{-- Ciudad --}}
                            <div class="form-group col-md-6">
                                <label for="status">Ciudad</label>
                                <input class="form-control" value="{{ $asesoria->ciudad->name }}" disabled/>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Abogado\a del Consultorio --}}
                            <div class="form-group col-md-6">
                                <label for="nombres_abogado">Abogado\a del Consultorio</label>
                                <input class="form-control" value="{{ $asesoria->nombres_abogado }}" disabled/>
                            </div>
                            {{-- fecha_asesoria --}}
                            <div class="form-group col-md-6">
                                <label for="fecha_asesoria" class="control-label">Fecha de la Asesoria</label>
                                <input class="form-control" value="{{ $asesoria->fecha_asesoria }}" disabled>
                            </div>
                        </div>
                        
                        <div class="row">
                            {{-- Materia --}}
                            <div class="form-group col-md-4">
                                <label for="materia">Materia</label>
                                <input class="form-control" value="{{ $asesoria->fecha_asesoria }}" disabled>
                            </div>
                            {{-- Linea de Servicios --}}
                            <div class="form-group col-md-4">
                                <label for="linea_servicios">Linea de Servicios</label>
                                <input class="form-control" value="{{ $asesoria->lineaServicios->nombre }}" disabled>
                            </div>
                            {{-- Servicios --}}
                            <div class="form-group col-md-4">
                                <label for="tema">Servicios</label>
                                <input class="form-control" value="{{ $asesoria->Servicios->nombre }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Tipo de Usuario --}}
                            <div class="form-group col-md-6">
                                <label for="tipo_usuario">Tipo de Usuario:</label>
                                <input class="form-control" value="{{ $asesoria->TipoUsuario->nombre }}" disabled>
                            </div>
                            {{-- Derivado --}}
                            <div class="form-group col-md-6">
                                <label for="derivado">Derivado por:</label>
                                <input class="form-control" value="{{ $asesoria->Derivado->nombre }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Estado de la causa derivada --}}
                            <div class="form-group col-md-6">
                                <label for="estado_causa">Estado de la causa derivada por:</label>
                                <input class="form-control" value="{{ $asesoria->estadoDerivada->nombre }}" disabled>
                            </div>
                            {{-- Seguimiento de la causa derivada --}}
                            <div class="form-group col-md-6">
                                <label for="seguimiento_causa">Seguimiento de la causa derivada:</label>
                                <select name="seguimiento_causa" class="form-control" disabled>
                                    <option value=""> </option>
                                    <option value="1" {{ $asesoria->seguimiento == 1 ? 'selected' : '' }}>Si</option>
                                    <option value="2" {{ $asesoria->seguimiento == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Se convirtió en Patrocinio --}}
                            <div class="form-group col-md-6">
                                <label for="patrocinio">Se convirtió en Patrocinio:</label>
                                <select name="patrocinio" class="form-control" disabled>
                                    <option value=""> </option>
                                    <option value="1" {{ $asesoria->patrocinio == 1 ? 'selected' : '' }}>Si</option>
                                    <option value="2" {{ $asesoria->patrocinio == 2 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            {{-- Observaciones --}}
                            <div class="form-group col-md-6">
                                <label for="observaciones" class="control-label">Observaciones</label>
                                <input class="form-control" value="{{ $asesoria->observaciones }}" disabled>
                            </div>
                        </div>

                        <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-3">
                    <div class="panel-body">
                        <div class="row">
                            {{-- NOMBRE DEL ABOGADO --}}
                         <div class="form-group col-md-6">
                            <label class="control-label">Apellidos Y Nombres Abogado\a  del Consultorio Juridico</label>
                            <input class="form-control" name="nombres_abogado" value="{{ old('nombres_abogado') }}" type="text" required="required"  />
                        </div>
                        </div>
                        <div class="row">
                            {{-- Fecha de Asignación de la Causa --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Fecha de Asignación de la Causa</label>
                                <input name="fecha_asignacion" value="{{ old('fecha_nacimiento') }}"
                                    maxlength="100" type="date" required="required" class="form-control" />
                            </div>
                             {{-- TIPO DE PATROCINIO --}}
                             <div class="form-group col-md-6">
                                <label for="tipoPatrocinio">Tipo de Patrocinio</label>
                                <select name="tipoPatrocinio" class="form-control" required>
                                    <option value="">Seleccionar Tipo de Patrocinio</option>
                                    @foreach ($tipoPatrocinio as $tP)
                                        <option value="{{ $tP->id }}">{{ $tP->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- TIPO DE JUDICATURA --}}
                            <div class="form-group col-md-6">
                                <label for="tipoJudicaura">Tipo de Judicatura</label>
                                <select name="tipoJudicaura" class="form-control" required>
                                    <option value="">Seleccionar Tipo de Judicatura</option>
                                    @foreach ($tipoJudicaura as $tJ)
                                        <option value="{{ $tJ->id }}">{{ $tJ->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                             {{-- UNIDAD JUDICIAL --}}
                             <div class="form-group col-md-6">
                                <label class="control-label">No. Juzgado \ Unidad Judicial</label>
                                <input class="form-control" name="unidad_judicial" value="{{ old('unidad_judicial') }}" type="number" required="required"  />
                            </div>
                        </div>
                        <div class="row">
                            {{-- NOMBRE DEL JUEZ --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Nombre Del Juez</label>
                                <input class="form-control" name="nombre_juez" value="{{ old('nombre_juez') }}" type="text" required="required"  />
                            </div>
                             {{-- No. de Causa --}}
                             <div class="form-group col-md-6">
                                <label class="control-label">No. de Causa</label>
                                <input class="form-control" type="number" name="numero_causa"  value="{{ old('numero_causa') }}"  required="required"  />
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label">última actividad o diligencia realizada por el abogado del CJGA</label>
                                <input class="form-control" name="ultima_actividad" value="{{ old('nombre_juez') }}" type="text" required="required"  />
                            </div>
                             <div class="form-group col-md-6">
                                <label class="control-label">Fecha de la última acrividad o diligencia realizada</label>
                                <input class="form-control" name="fecha_ultima_actividad" type="date" value="{{ old('fecha_ultima_actividad') }}"  required="required"/>
                            </div>
                        </div> --}}
                        <div class="row">
                            {{-- Estado --}}
                            <div class="form-group col-md-6">
                                <label for="estado">Estado</label>
                                <select name="estado" class="form-control" required>
                                    <option value="">Seleccionar Estado</option>
                                    @foreach ($estados as $est)
                                        <option value="{{ $est->id }}">{{ $est->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                             {{-- Resolución Judicial --}}
                            <div class="form-group col-md-6">
                                <label for="resolución_judicial">Resolución Judicial \ Sentencia</label>
                                <select name="resolución_judicial" class="form-control" required>
                                    <option value=""> </option>
                                    <option value="1">No</option>
                                    <option value="2">Si</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Fecha Resolución Judicial --}}
                        <div class="form-group col-md-6">
                            <label class="control-label">Fecha Resolución Judicial \ Sentencia</label>
                            <input class="form-control" name="fecha_resolucion" type="date" value="{{ old('fecha_resolucion') }}"  required="required"/>
                        </div>
                             {{-- OBSERVACIONES --}}
                             <div class="form-group col-md-6">
                                <label class="control-label">Observaciones</label>
                                <input class="form-control" name="observacion" value="{{ old('observacion') }}" type="text" required="required"  />
                            </div>
                        </div>                        
                        <button class="btn btn-success pull-right" type="submit">Guardar</button>
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
        $(document).ready(function() {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');
            allPrevBtn = $('.prevBtn');

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
                    curInputs = curStep.find("input[type='text'],input[type='url'],select"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            allPrevBtn.click(function() {

                var curStep = $(this).closest(".setup-content"),

                    curStepBtn = curStep.attr("id"),

                    prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev()
                    .children("a");

                prevStepWizard.removeAttr('disabled').trigger('click');

            });

            $('div.setup-panel div a.btn-success').trigger('click');
        });
    </script>
@endsection
