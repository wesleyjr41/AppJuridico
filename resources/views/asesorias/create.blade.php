@extends('layouts.panel')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/stepper.css') }}">
@endsection


@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nueva Asesoria Para: <span><strong>{{ $cliente->profiles->nombres }}
                                {{ $cliente->profiles->apellidos }}</strong></span> </h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/clientes') }}" class="btn btn-sm btn-success">
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
                        <p><small>Datos Personales</small></p>
                    </div>
                    <div class="stepwizard-step col-xs-3">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p><small>Perfil</small></p>
                    </div>
                    <div class="stepwizard-step col-xs-3">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                        <p><small>Información de Contacto</small></p>
                    </div>
                    {{-- <div class="stepwizard-step col-xs-3">
                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                        <p><small>Cargo</small></p>
                    </div> --}}
                </div>
            </div>
            <form action="{{ url('/asesorias') }}" method="POST">
                @csrf

                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-body">
                        <div class="row">
                            <input name="cliente_id" value="{{ $cliente->id }}" type="hidden" required="required" />
                            {{-- APELLIDOS --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Apellidos</label>
                                <input name="apellidos" value="{{ $cliente->profiles->apellidos }}" maxlength="100"
                                    type="text" required="required" class="form-control"
                                    placeholder="Ingresar Apellidos" />
                            </div>
                            {{-- NOMBRES --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Nombres</label>
                                <input name="nombres" value="{{ $cliente->profiles->nombres }}" maxlength="100"
                                    type="text" required="required" class="form-control"
                                    placeholder="Ingresar Nombres" />
                            </div>
                        </div>
                        <div class="row">
                            {{-- IDENTIFICACION --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Nº Cédula</label>
                                <input name="identificacion" value="{{ $cliente->profiles->identificacion }}"
                                    maxlength="10"type="text" required="required" class="form-control"
                                    placeholder="Ingresar Número de Cédula" />
                            </div>
                            {{-- FECHA DE NACIMIENTO --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Fecha de Nacimiento</label>
                                <input name="fecha_nacimiento" value="{{ $cliente->profiles->fecha_nacimiento }}"
                                    maxlength="100" type="date" required="required" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            {{-- direccion --}}
                            <div class="form-group col-md-6">
                                <label for="direccion" class="control-label">Dirección</label>
                                <input name="direccion" value="{{ $cliente->profiles->direccion }}" maxlength="100"
                                    type="text" required="required" class="form-control"
                                    placeholder="Ingresar Dirección" />
                            </div>
                            {{-- GENERO --}}
                            <div class="form-group col-md-6">
                                <label for="genero">Genero</label>
                                <select name="genero" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($generos as $genero)
                                        <option value="{{ $genero->id }}"
                                            {{ $cliente->profiles->genero_id == $genero->id ? 'selected' : '' }}>
                                            {{ $genero->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- PAIS DE ORIGEN --}}
                            <div class="form-group col-md-6">
                                <label for="pais">País de Origen</label>
                                <select name="pais" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->id }}"
                                            {{ $cliente->profiles->pais_id == $pais->id ? 'selected' : '' }}>
                                            {{ $pais->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- etnia --}}
                            <div class="form-group col-md-6">
                                <label for="etnia">Etnía</label>
                                <select name="etnia" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($etnias as $etnia)
                                        <option value="{{ $etnia->id }}"
                                            {{ $cliente->profiles->etnia_id == $etnia->id ? 'selected' : '' }}>
                                            {{ $etnia->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- instruccion --}}
                            <div class="form-group col-md-6">
                                <label for="instruccion">Instrucción</label>
                                <select name="instruccion" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($instruccion as $inst)
                                        <option value="{{ $inst->id }}"
                                            {{ $cliente->instruccion_id == $inst->id ? 'selected' : '' }}>
                                            {{ $inst->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- ocupacion --}}
                            <div class="form-group col-md-6">
                                <label for="ocupacion">Ocupación</label>
                                <select name="ocupacion" class="form-control" required>
                                    <option value=""></option>
                                    @foreach ($ocupacion as $ocup)
                                        <option value="{{ $ocup->id }}"
                                            {{ $cliente->ocupacion_id == $ocup->id ? 'selected' : '' }}>
                                            {{ $ocup->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- estado --}}
                            <div class="form-group col-md-6">
                                <label for="estado">Estado Civil</label>
                                <select name="estado" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($estado_civil as $estC)
                                        <option value="{{ $estC->id }}"
                                            {{ $cliente->estado_civil_id == $estC->id ? 'selected' : '' }}>
                                            {{ $estC->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- nivel_ingresos --}}
                            <div class="form-group col-md-6">
                                <label for="nivel_ingresos">Nivel de Ingresos</label>
                                <select name="nivel_ingresos" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($nivel_ingresos as $nv)
                                        <option value="{{ $nv->id }}"
                                            {{ $cliente->nivel_ingresos_id == $nv->id ? 'selected' : '' }}>
                                            {{ $nv->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- zona --}}
                            <div class="form-group col-md-6">
                                <label for="zona">Zona en la que Vive</label>
                                <select name="zona" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($zona as $zn)
                                        <option value="{{ $zn->id }}"
                                            {{ $cliente->zona_vive_id == $zn->id ? 'selected' : '' }}>
                                            {{ $zn->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- telefono --}}
                            <div class="form-group col-md-6">
                                <label for="telefono" class="control-label">Telefono</label>
                                <input name="telefono" value="{{ $cliente->profiles->telefono }}" maxlength="100"
                                    type="text" required="required" class="form-control"
                                    placeholder="Ingresar Telefono" />
                            </div>
                        </div>
                        <div class="row">
                            {{-- discapacidad --}}
                            <div class="form-group col-md-6">
                                <label for="discapacidad">Discapacidad</label>
                                <select name="discapacidad" class="form-control" required>
                                    <option value=""> </option>
                                    <option value="{{ $cliente->profiles->clientes->discapacidad }}"
                                        {{ $cliente->discapacidad == 2 ? 'selected' : '' }}>No</option>
                                    <option value="{{ $cliente->discapacidad }}"
                                        {{ $cliente->discapacidad == 1 ? 'selected' : '' }}>Si</option>
                                </select>
                            </div>
                            {{-- bono --}}
                            <div class="form-group col-md-6">
                                <label for="bono">Recibe Bono:</label>
                                <select name="bono" class="form-control" required>
                                    <option value=""> </option>
                                    <option value="{{ $cliente->bono }}" {{ $cliente->bono == 2 ? 'selected' : '' }}>
                                        No
                                    </option>
                                    <option value="{{ $cliente->bono }}" {{ $cliente->bono == 1 ? 'selected' : '' }}>
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
                            <select class="form-control" name="CJGA" required="required">
                                <option value="">Selecciona una CJGA</option>
                                @foreach ($cjga as $cj)
                                    <option value="{{ $cj->id }}">{{ $cj->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            {{-- MES iNFORME --}}
                            <div class="form-group col-md-6">
                                <label for="mes">Mes Informe</label>
                                <select class="form-control" name="mes" required="required">
                                    <option value="">Selecciona Mes del Informe</option>
                                    <option value="Enero">Enero</option>
                                    <option value="Febrero">Febrero</option>
                                    <option value="Marzo">Marzo</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Junio">Junio</option>
                                    <option value="Julio">Julio</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Septiembre">Septiembre</option>
                                    <option value="Octubre">Octubre</option>
                                    <option value="Noviembre">Noviembre</option>
                                    <option value="Diciembre">Diciembre</option>
                                </select>
                            </div>
                            {{-- AÑO iNFORME --}}
                            <div class="form-group col-md-6">
                                <label for="anio" class="control-label">Año Informe</label>
                                <input class="form-control" name="anio" value="2023" type="number" min="1900"
                                    max="2099" placeholder="Ingresar Año del Informe" required="required" />
                            </div>
                        </div>

                        <div class="row">
                            {{-- PROVINCIA --}}
                            <div class="form-group col-md-6">
                                <label for="status">Provincia</label>
                                <select class="form-control" id="provincia" name="provincia" required="required">
                                    <option value="">Selecciona una Provincia</option>
                                    @foreach ($provincias as $provincia)
                                        <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- CIUDAD --}}
                            <div class="form-group col-md-6">
                                <label for="ciudad">Ciudad:</label>
                                <select name="ciudad" id="ciudad" required="required" class="form-control" disabled>
                                    <option value="">Selecciona una ciudad</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            {{-- NOMBRE ABOGADO --}}
                            <div class="form-group col-md-6">
                                <label for="nombres_abogado">Abogado\a del Consultorio</label>
                                <input name="nombres_abogado" value="{{ old('nombres_abogado') }}" maxlength="10"
                                    type="text" class="form-control" placeholder="Ingresar Apellidos y Nombres"
                                    required="required" />
                            </div>
                            {{-- FECHA ASESORIA --}}
                            <div class="form-group col-md-6">
                                <label for="fecha_asesoria" class="control-label">Fecha de la Asesoria</label>
                                <input name="fecha_asesoria" value="{{ old('fecha_asesoria') }}" type="date"
                                    required="required" class="form-control"
                                    placeholder="Fecha que se realiza la Asesoria" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="materia">Materia</label>
                                <select name="materia" class="form-control" required="required">
                                    <option value="">------Selecciona una Materia-----</option>
                                    @foreach ($materias as $materia)
                                        <option value="{{ $materia->id }}">{{ $materia->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="linea_servicios">Linea de Servicios</label>
                                <select class="form-control" name="linea_servicios" id="linea_servicios"
                                    required="required">
                                    <option value="">Selecciona una Linea de Servicios</option>
                                    @foreach ($lineas as $linea)
                                        <option value="{{ $linea->id }}">{{ $linea->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tema">Servicios</label>
                                <select class="form-control" name="tema" id="tema" required="required">
                                    <option value="">Selecciona un Tema</option>
                                </select>
                            </div>
                        </div>
                        <div class="container mb-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-info prevBtn pull-left" type="button">Anterior</button>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary setup-content" id="step-3">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tipo_usuario">Tipo de Usuario:</label>
                                <select name="tipo_usuario" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($tipoUsuarios as $tipoU)
                                        <option value="{{ $tipoU->id }}">{{ $tipoU->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="derivado">Derivado por:</label>
                                <select name="derivado" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($derivados as $deri)
                                        <option value="{{ $deri->id }}">{{ $deri->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="estado_causa">Estado de la causa derivada por:</label>
                                <select name="estado_causa" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($estadosCausa as $estC)
                                        <option value="{{ $estC->id }}">{{ $estC->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="seguimiento_causa">Seguimiento de la causa derivada:</label>
                                <select name="seguimiento_causa" class="form-control" required>
                                    <option value=""> </option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="patrocinio">Se convirtió en Patrocinio:</label>
                                <select name="patrocinio" class="form-control" required>
                                    <option value=""> </option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="observaciones" class="control-label">Observaciones</label>
                                <input name="observaciones" value="{{ old('observacion') }}" maxlength="10"
                                    type="text" required="required" class="form-control"
                                    placeholder="Observaciones" />
                            </div>
                        </div>
                        <div class="container mb-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-info prevBtn pull-left" type="button">Anterior</button>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-success pull-right" type="submit">Guardar</button>
                                </div>
                            </div>
                        </div>
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

    <script>
        $(document).ready(function() {
            $('#provincia').change(function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: '/getCities/' + provinceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#ciudad').empty().append(
                                '<option value="">Selecciona una ciudad</option>');
                            $.each(data, function(key, value) {
                                $('#ciudad').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            $('#ciudad').prop('disabled', false);
                        }
                    });
                } else {
                    $('#ciudad').empty().append('<option value="">Selecciona una ciudad</option>');
                    $('#ciudad').prop('disabled', true);
                }
            });
            $('#linea_servicios').change(function() {
                var linea_servicios_id = $(this).val();
                if (linea_servicios_id) {
                    $.ajax({
                        url: '/getServicios/' + linea_servicios_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#tema').empty().append(
                                '<option value="">Selecciona un Tema</option>');
                            $.each(data, function(key, value) {
                                $('#tema').append('<option value="' + value.id + '">' +
                                    value.nombre + '</option>');
                            });
                            $('#tema').prop('disabled', false);
                        }
                    });
                } else {
                    $('#tema').empty().append('<option value="">Selecciona un Tema</option>');
                    $('#tema').prop('disabled', true);
                }
            });
        });
    </script>
@endsection
