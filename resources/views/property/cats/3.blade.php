<div class="row">
    <h3>Interior Features</h3>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Area (Sq.Ft)')->class('req') }}
            {{ html()->number('square_feet', $property?->square_feet ?? old('square_feet'))->class('form-control')->placeholder('0') }}
            @error('square_feet')
            <small class="text-danger">{{ $errors->first('square_feet') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Lobby lounge and front desk area')->class('req') }}
            {{ html()->select('has_lobby', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_lobby ?? old('has_lobby'))->class('form-control')->placeholder('Select') }}
            @error('has_lobby')
            <small class="text-danger">{{ $errors->first('has_lobby') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Concierge or guest services desk')->class('req') }}
            {{ html()->select('has_concierge', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_concierge ?? old('has_concierge'))->class('form-control')->placeholder('Select') }}
            @error('has_concierge')
            <small class="text-danger">{{ $errors->first('has_concierge') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('On-site restaurant / Cafe')->class('req') }}
            {{ html()->select('has_restaurant', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_restaurant ?? old('has_restaurant'))->class('form-control')->placeholder('Select') }}
            @error('has_restaurant')
            <small class="text-danger">{{ $errors->first('has_restaurant') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Poolside bar or indoor bar')->class('req') }}
            {{ html()->select('has_bar', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_bar ?? old('has_bar'))->class('form-control')->placeholder('Select') }}
            @error('has_bar')
            <small class="text-danger">{{ $errors->first('has_bar') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text("Game room / Kid's club")->class('req') }}
            {{ html()->select('has_game_room', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_game_room ?? old('has_game_room'))->class('form-control')->placeholder('Select') }}
            @error('has_game_room')
            <small class="text-danger">{{ $errors->first('has_game_room') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Business center or meeting rooms')->class('req') }}
            {{ html()->select('has_meeting_room', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_meeting_room ?? old('has_meeting_room'))->class('form-control')->placeholder('Select') }}
            @error('has_meeting_room')
            <small class="text-danger">{{ $errors->first('has_meeting_room') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Indoor event/banquet spaces')->class('req') }}
            {{ html()->select('has_event_spaces', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_event_spaces ?? old('has_event_spaces'))->class('form-control')->placeholder('Select') }}
            @error('has_event_spaces')
            <small class="text-danger">{{ $errors->first('has_event_spaces') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Laundry rooms')->class('req') }}
            {{ html()->select('has_laundry', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_laundry ?? old('has_laundry'))->class('form-control')->placeholder('Select') }}
            @error('has_laundry')
            <small class="text-danger">{{ $errors->first('has_laundry') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Daily housekeeping ')->class('req') }}
            {{ html()->select('has_daily_housekeeping', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_daily_housekeeping ?? old('has_daily_housekeeping'))->class('form-control')->placeholder('Select') }}
            @error('has_daily_housekeeping')
            <small class="text-danger">{{ $errors->first('has_daily_housekeeping') }}</small>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group facilities">
                {{ html()->label()->text('Amenities / Facilities')->class('req') }}
                <ul class="check-list">
                    @forelse($extras->where('name', 'amenity') as $key => $item)
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
</div>
<div class="row">
    <h3>Safety & Operational Features</h3>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Keycard or smart lock entry')->class('req') }}
            {{ html()->select('has_smart_lock', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_smart_lock ?? old('has_smart_lock'))->class('form-control')->placeholder('Select') }}
            @error('has_smart_lock')
            <small class="text-danger">{{ $errors->first('has_smart_lock') }}</small>
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