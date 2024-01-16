@extends('layouts.panel')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/stepper.css') }}">
@endsection



@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo Cliente</h3>
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

            <form action="{{ url('clientes') }}" method="POST">
                @csrf

                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-body">
                        <div class="row">
                            {{-- APELLIDOS --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Apellidos</label>
                                <input name="apellidos" value="{{ old('apellidos') }}" maxlength="50" type="text"
                                    required="required" class="form-control" placeholder="Ingresar Apellidos" />
                            </div>
                            {{-- NOMBRES --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Nombres</label>
                                <input name="nombres" value="{{ old('nombres') }}" maxlength="50" type="text"
                                    required="required" class="form-control" placeholder="Ingresar Nombres" />
                            </div>
                        </div>
                        <div class="row">
                            {{-- IDENTIFICACION --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Nº Cédula</label>
                                <input name="identificacion" value="{{ old('identificacion') }}" maxlength="10"
                                    type="text" class="form-control" placeholder="Ingresar Número de Cédula" required
                                    oninput="validarLongitud(this)" />
                            </div>
                            {{-- FECHA DE NACIMIENTO --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Fecha de Nacimiento</label>
                                <input name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" type="date"
                                    required="required" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            {{-- TELEFONO --}}
                            <div class="form-group col-md-6">
                                <label class="control-label">Telefono</label>
                                <input name="telefono" value="{{ old('telefono') }}" maxlength="10" type="text"
                                    required="required" class="form-control" placeholder="Ingresar Telefono"
                                    oninput="validarLongitud(this)" />
                            </div>
                            {{-- GENERO --}}
                            <div class="form-group col-md-6">
                                <label for="genero">Genero</label>
                                <select name="genero" class="form-control" required>
                                    <option value="">Seleccionar Genero</option>
                                    @foreach ($generos as $genero)
                                        <option value="{{ $genero->id }}"> {{ $genero->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- PAIS DE ORIGEN --}}
                            <div class="form-group col-md-6">
                                <label for="pais">País de Origen</label>
                                <select name="pais" class="form-control" required>
                                    <option value="">Seleccionar País de Origen</option>
                                    @foreach ($paises as $pais)
                                        <option value="{{ $pais->id }}">{{ $pais->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="etnia">Etnía</label>
                                <select name="etnia" class="form-control" required>
                                    <option value="">Seleccionar Etnía</option>
                                    @foreach ($etnias as $etnia)
                                        <option value="{{ $etnia->id }}">{{ $etnia->name }}</option>
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
                            <div class="form-group col-md-6">
                                <label for="instruccion">Instrucción</label>
                                <select name="instruccion" class="form-control" required>
                                    <option value="">Seleccionar Instrucción</option>
                                    @foreach ($instruccion as $int)
                                        <option value="{{ $int->id }}">{{ $int->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ocupacion">Ocupación</label>
                                <select name="ocupacion" class="form-control" required>
                                    <option value="">Seleccionar Ocupación</option>
                                    @foreach ($ocupacion as $oc)
                                        <option value="{{ $oc->id }}">{{ $oc->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="estado">Estado Civil</label>
                                <select name="estado" class="form-control" required>
                                    <option value="">Seleccionar Estado Civil</option>
                                    @foreach ($estado as $est)
                                        <option value="{{ $est->id }}">{{ $est->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nivel_ingresos">Nivel de Ingresos</label>
                                <select name="nivel_ingresos" class="form-control" required>
                                    <option value="">Seleccionar Nivel de Ingresos</option>
                                    @foreach ($nivel_ingresos as $nv)
                                        <option value="{{ $nv->id }}">{{ $nv->nombre }}</option>
                                    @endforeach
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
                                <label for="discapacidad">Discapacidad</label>
                                <select name="discapacidad" class="form-control" required>
                                    <option value="">Seleccionar Discapacidad</option>
                                    <option value="2">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bono">Recibe Bono:</label>
                                <select name="bono" class="form-control" required>
                                    <option value="">Seleccionar Si Recibe Bono</option>
                                    <option value="2">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="zona">Zona en la que Vive</label>
                                <select name="zona" class="form-control" required>
                                    <option value="">Seleccionar la Zona en la que Vive</option>
                                    @foreach ($zona as $zn)
                                        <option value="{{ $zn->id }}">{{ $zn->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Dirección</label>
                                <input name="direccion" value="{{ old('direccion') }}" maxlength="50" type="text"
                                    required="required" class="form-control" placeholder="Ingresar Dirección" />
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
        function validarLongitud(input) {
            var valor = input.value;
            input.value = input.value.replace(/\D/g, '');

            if (valor.length > 10) {
                // Si la longitud es mayor que 10, cortamos el valor para que tenga solo 10 caracteres
                input.value = valor.slice(0, 10);
            }

            // Puedes agregar más lógica de validación si es necesario
        }
    </script>

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
