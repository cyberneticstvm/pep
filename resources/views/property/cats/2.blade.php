<div class="row">
    <h3>Interior Features</h3>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Area (Sq.Ft)')->class('req') }}
            {{ html()->number('square_feet', $property?->square_feet ?? old('square_feet'))->class('form-control')->placeholder('0') }}
            @error('square_feet')
            <small class="text-danger">{{ $errors->first('square_feet') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Open Floor Plan')->class('req') }}
            {{ html()->select('has_open_floor_plan', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_open_floor_plan ?? old('has_open_floor_plan'))->class('form-control')->placeholder('Select') }}
            @error('has_open_floor_plan')
            <small class="text-danger">{{ $errors->first('has_open_floor_plan') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Private Offices')->class('req') }}
            {{ html()->select('has_private_offices', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_private_offices ?? old('has_private_offices'))->class('form-control')->placeholder('Select') }}
            @error('has_private_offices')
            <small class="text-danger">{{ $errors->first('has_private_offices') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Conference Rooms')->class('req') }}
            {{ html()->select('has_conference_rooms', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_conference_rooms ?? old('has_conference_rooms'))->class('form-control')->placeholder('Select') }}
            @error('has_conference_rooms')
            <small class="text-danger">{{ $errors->first('has_conference_rooms') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Reception Area')->class('req') }}
            {{ html()->select('has_reception_area', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_reception_area ?? old('has_reception_area'))->class('form-control')->placeholder('Select') }}
            @error('has_reception_area')
            <small class="text-danger">{{ $errors->first('has_reception_area') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Break room / Kitchenette')->class('req') }}
            {{ html()->select('has_break_room', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_break_room ?? old('has_break_room'))->class('form-control')->placeholder('Select') }}
            @error('has_break_room')
            <small class="text-danger">{{ $errors->first('has_break_room') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Restrooms (ADA compliant, gender-specific/unisex)')->class('req') }}
            {{ html()->select('has_rest_room', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_rest_room ?? old('has_rest_room'))->class('form-control')->placeholder('Select') }}
            @error('has_rest_room')
            <small class="text-danger">{{ $errors->first('has_rest_room') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('HVAC (Heating, Ventilation, Air Conditioning)')->class('req') }}
            {{ html()->select('has_hvac', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_hvac ?? old('has_hvac'))->class('form-control')->placeholder('Select') }}
            @error('has_hvac')
            <small class="text-danger">{{ $errors->first('has_hvac') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Elevator access (for multi-story buildings)')->class('req') }}
            {{ html()->select('has_elevator', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_elevator ?? old('has_elevator'))->class('form-control')->placeholder('Select') }}
            @error('has_elevator')
            <small class="text-danger">{{ $errors->first('has_elevator') }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row mt-3">
    <h3>Build-Out and Finishes</h3>
    <div class="col-lg-12">
        <div class="form-group facilities">
            {{ html()->label()->text('Finished ceilings')->class('req') }}
            <ul class="check-list">
                @forelse($extras->where('category_id', $category->id)->where('name', 'ceiling') as $key => $item)
                <li class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault_{{ $item->id }}">
                        <label class="form-check-label" for="flexCheckDefault_{{ $item->id }}">
                            {{ $item->value }}
                        </label>
                    </div>
                </li>
                @empty
                @endforelse
            </ul>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group facilities">
            {{ html()->label()->text('Floor Type')->class('req') }}
            <ul class="check-list">
                @forelse($extras->where('name', 'floor') as $key => $item)
                <li class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault_{{ $item->id }}">
                        <label class="form-check-label" for="flexCheckDefault_{{ $item->id }}">
                            {{ $item->value }}
                        </label>
                    </div>
                </li>
                @empty
                @endforelse
            </ul>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group facilities">
            {{ html()->label()->text('Lighting')->class('req') }}
            <ul class="check-list">
                @forelse($extras->where('name', 'lighting') as $key => $item)
                <li class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault_{{ $item->id }}">
                        <label class="form-check-label" for="flexCheckDefault_{{ $item->id }}">
                            {{ $item->value }}
                        </label>
                    </div>
                </li>
                @empty
                @endforelse
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('High Cielings')->class('req') }}
            {{ html()->select('has_high_ceilings', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_high_ceilings ?? old('has_high_ceilings'))->class('form-control')->placeholder('Select') }}
            @error('has_high_ceilings')
            <small class="text-danger">{{ $errors->first('has_high_ceilings') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Soundproofing or Acoustic Panels')->class('req') }}
            {{ html()->select('has_soundproofing', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_soundproofing ?? old('has_soundproofing'))->class('form-control')->placeholder('Select') }}
            @error('has_soundproofing')
            <small class="text-danger">{{ $errors->first('has_soundproofing') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Built-in cabinetry or storage')->class('req') }}
            {{ html()->select('has_cabinetry', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_cabinetry ?? old('has_cabinetry'))->class('form-control')->placeholder('Select') }}
            @error('has_cabinetry')
            <small class="text-danger">{{ $errors->first('has_cabinetry') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Partitioned cubicles')->class('req') }}
            {{ html()->select('has_cubicles', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_cubicles ?? old('has_cubicles'))->class('form-control')->placeholder('Select') }}
            @error('has_cubicles')
            <small class="text-danger">{{ $errors->first('has_cubicles') }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row mt-3">
    <h3>Technology and Utilities</h3>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('High-speed internet connectivity')->class('req') }}
            {{ html()->select('has_internet', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_internet ?? old('has_internet'))->class('form-control')->placeholder('Select') }}
            @error('has_internet')
            <small class="text-danger">{{ $errors->first('has_internet') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Pre-wired for data/phones')->class('req') }}
            {{ html()->select('has_phone', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_phone ?? old('has_phone'))->class('form-control')->placeholder('Select') }}
            @error('has_phone')
            <small class="text-danger">{{ $errors->first('has_phone') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Security system (alarms, cameras)')->class('req') }}
            {{ html()->select('has_security_system', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_security_system ?? old('has_security_system'))->class('form-control')->placeholder('Select') }}
            @error('has_security_system')
            <small class="text-danger">{{ $errors->first('has_security_system') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Fire suppression system / sprinklers')->class('req') }}
            {{ html()->select('has_fire_suppression_system', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_fire_suppression_system ?? old('has_fire_suppression_system'))->class('form-control')->placeholder('Select') }}
            @error('has_fire_suppression_system')
            <small class="text-danger">{{ $errors->first('has_fire_suppression_system') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Smart controls (for lighting, climate)')->class('req') }}
            {{ html()->select('has_smart_controls', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_smart_controls ?? old('has_smart_controls'))->class('form-control')->placeholder('Select') }}
            @error('has_smart_controls')
            <small class="text-danger">{{ $errors->first('has_smart_controls') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Backup power systems')->class('req') }}
            {{ html()->select('has_power_backup', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_power_backup ?? old('has_power_backup'))->class('form-control')->placeholder('Select') }}
            @error('has_power_backup')
            <small class="text-danger">{{ $errors->first('has_power_backup') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Emergency lighting / exit signage')->class('req') }}
            {{ html()->select('has_exit_signage', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_exit_signage ?? old('has_exit_signage'))->class('form-control')->placeholder('Select') }}
            @error('has_exit_signage')
            <small class="text-danger">{{ $errors->first('has_exit_signage') }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row mt-3">
    <h3>Special Fetaures</h3>
    <div class="col-lg-12">
        <div class="form-group facilities">
            {{ html()->label()->text('Spetial Fetures')->class('req') }}
            <ul class="check-list">
                @forelse($extras->where('subcategory_id', '>', 0)->where('subcategory_id', $category->property_type)->where('name', 'type') as $key => $item)
                <li class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault_{{ $item->id }}">
                        <label class="form-check-label" for="flexCheckDefault_{{ $item->id }}">
                            {{ $item->value }}
                        </label>
                    </div>
                </li>
                @empty
                @endforelse
            </ul>
        </div>
    </div>
</div>