<div class="input-group">
    <div class="col-md-10 mx-auto">
        <select  wire:model="selectedState" name="state" class="form-control px-4 " required>
            <option value="" >Seleccionar un departamento</option>
            @if (!is_null($selectedCountry))
                @foreach($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            @else
            <option value="" disabled selected>Debe seleccionar un departamento</option>
            @endif
        </select>
    </div>

    @if($selectedState)
    <div class="col-md-10 mx-auto">
        <select wire:model="selectedCity" name="city" class="form-control px-4 mt-2" required>
            @if (!is_null($selectedState))
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ Str::title($city->name) }}</option>
                @endforeach
            @else
            <option value="" disabled selected>Debe seleccionar una ciudad</option>
            @endif
        </select>
    </div>
    @endif
</div>
