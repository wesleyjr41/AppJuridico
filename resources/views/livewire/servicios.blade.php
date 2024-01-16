<div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="materia">Materia</label>
            <select name="materia" class="form-control" required>
                <option value="">------Selecciona una Materia-----</option>
                @foreach ($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="linea_servicios">Linea de Servicios</label>
            <select name="linea_servicios" wire:model.live="lineaId" class="form-control" required>
                <option value="">------Selecciona una Linea de Servicios-----</option>
                @foreach ($lineas as $linea)
                    <option value="{{ $linea->id }}">{{ $linea->nombre }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group col-md-4">
            <label for="tema">Servicios</label>
            <select name="tema" wire:model.live="servicioId" class="form-control" required>
                <option value="">-----Selecciona un Servicio-------</option>
                @foreach ($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>