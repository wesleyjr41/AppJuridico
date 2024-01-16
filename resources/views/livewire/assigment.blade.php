<div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="status">Provincia</label>
                <select name="provincia" wire:model.live="stateId" class="form-control">
                    <option value="">Selecciona una Provincia</option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="status">Ciudad</label>
                <select name="ciudad" wire:model.live="cityId" class="form-control">
                    <option value="">Selecciona una Ciudad</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
    </div>
</div>
