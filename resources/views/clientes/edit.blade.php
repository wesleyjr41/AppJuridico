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
                    <h3 class="mb-0">Editar Cliente</h3>
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

            <form action="{{ url('clientes/'.$profile->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="panel panel-primary setup-content" id="step-1">
                    {{-- <div class="panel-heading">
                         <h3 class="panel-title">Shipper</h3>
                    </div> --}}
                    <div class="panel-body">
                        <div class="row">
                            {{-- APELLIDOS --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Apellidos</label>
                                <input name="apellidos" value="{{ $profile->apellidos }}" maxlength="100" type="text"
                                    required="required" class="form-control" placeholder="Ingresar Apellidos" />
                            </div>
                            {{-- NOMBRES --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Nombres</label>
                                <input name="nombres" value="{{ $profile->nombres }}" maxlength="100" type="text"
                                    required="required" class="form-control" placeholder="Ingresar Nombres" />
                            </div>
                        </div>
                        <div class="row">
                            {{-- IDENTIFICACION --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Nº Cédula</label>
                                <input name="identificacion" value="{{ $profile->identificacion }}" maxlength="10"
                                    type="text" required="required" class="form-control"
                                    placeholder="Ingresar Número de Cédula" />
                            </div>
                            {{-- FECHA DE NACIMIENTO --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Fecha de Nacimiento</label>
                                <input name="fecha_nacimiento" value="{{ $profile->fecha_nacimiento }}" maxlength="100"
                                    type="date" required="required" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            {{-- EDAD --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Edad</label>
                                <input name="edad" maxlength="10" value="{{ $profile->edad }}" type="text"
                                    required="required" class="form-control" placeholder="Ingresar Edad" />
                            </div>
                            {{-- GENERO --}}
                            <div class="form-group col-md-6">
                                <label for="genero">Genero</label>
                                <select name="genero" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($generos as $genero)
                                        <option value="{{ $genero->id }}" {{ $profile->genero_id == $genero->id ? 'selected' : '' }}>
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
                                            {{ $profile->pais_id == $pais->id ? 'selected' : '' }}>{{ $pais->name }}
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
                                            {{ $profile->etnia_id == $etnia->id ? 'selected' : '' }}>{{ $etnia->name }}
                                        </option>
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
                            {{-- instruccion --}}
                            <div class="form-group col-md-6">
                                <label for="instruccion">Instrucción</label>
                                <select name="instruccion" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($instruccion as $inst)
                                        <option value="{{ $inst->id }}"
                                            {{ $cliente->instruccion_id == $inst->id ? 'selected' : '' }}>{{ $inst->nombre }}
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
                                            {{ $cliente->ocupacion_id == $ocup->id ? 'selected' : '' }}>{{ $ocup->nombre }}
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
                                            {{ $cliente->estado_civil_id == $estC->id ? 'selected' : '' }}>{{ $estC->nombre }}
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
                                            {{ $cliente->nivel_ingresos_id == $nv->id ? 'selected' : '' }}>{{ $nv->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-3">
                    <div class="panel-body">
                        <div class="row">
                            {{-- zona --}}
                            <div class="form-group col-md-6">
                                <label for="zona">Zona en la que Vive</label>
                                <select name="zona" class="form-control" required>
                                    <option value=""> </option>
                                    @foreach ($zona as $zn)
                                        <option value="{{ $zn->id }}"
                                            {{ $cliente->zona_vive_id == $zn->id ? 'selected' : '' }}>{{ $zn->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- telefono --}}
                            <div class="form-group col-md-6">
                                <label for="telefono" class="control-label">Telefono</label>
                                <input name="telefono" value="{{ $profile->telefono }}" maxlength="100" type="text"
                                    required="required" class="form-control" placeholder="Ingresar Telefono" />
                            </div>
                        </div>
                        <div class="row">
                            {{-- discapacidad --}}
                            <div class="form-group col-md-6">
                                <label for="discapacidad">Discapacidad</label>
                                <select name="discapacidad" class="form-control" required>
                                    <option value=""> </option>
                                    <option value="{{ $profile->clientes->discapacidad }}"
                                        {{ $profile->clientes->discapacidad == 2 ? 'selected' : '' }}>No</option>
                                    <option value="{{ $profile->clientes->discapacidad }}"
                                        {{ $profile->clientes->discapacidad == 1 ? 'selected' : '' }}>Si</option>
                                </select>
                            </div>
                            {{-- bono --}}
                            <div class="form-group col-md-6">
                                <label for="bono">Recibe Bono:</label>
                                <select name="bono" class="form-control" required>
                                    <option value=""> </option>
                                    <option value="{{ $profile->clientes->bono }}" {{ $profile->clientes->bono == 2 ? 'selected' : '' }}>No
                                    </option>
                                    <option value="{{ $profile->clientes->bono }}" {{ $profile->clientes->bono == 1 ? 'selected' : '' }}>Si
                                    </option>
                                </select>
                            </div>
                        </div>
                        {{-- direccion --}}
                        <div class="form-group">
                            <label for="direccion" class="control-label">Dirección</label>
                            <input name="direccion" value="{{ $profile->direccion }}" maxlength="100" type="text"
                                required="required" class="form-control" placeholder="Ingresar Dirección" />
                        </div>
                        {{-- <button class="btn btn-primary nextBtn pull-right" type="button">Next</button> --}}
                       {{--  @foreach ($permiso as $item)
                        @if ($item->permisoid == 3) --}}
                        <button class="btn btn-success pull-right" type="submit">Actualizar</button>
                        {{-- @endif
                        @endforeach --}}
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
