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
            {{ html()->label()->text('No. of Beds')->class('req') }}
            {{ html()->number('number_of_beds', $property?->number_of_beds ?? old('number_of_beds'))->class('form-control')->placeholder('0') }}
            @error('number_of_beds')
            <small class="text-danger">{{ $errors->first('number_of_beds') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('No. of Baths')->class('req') }}
            {{ html()->number('number_of_baths', $property?->number_of_baths ?? old('number_of_baths'))->class('form-control')->placeholder('0') }}
            @error('number_of_baths')
            <small class="text-danger">{{ $errors->first('number_of_baths') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Has Fireplace')->class('req') }}
            {{ html()->select('has_fireplace', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_fireplace ?? old('has_fireplace'))->class('form-control')->placeholder('Select') }}
            @error('has_fireplace')
            <small class="text-danger">{{ $errors->first('has_fireplace') }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
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
            {{ html()->label()->text('Appliances')->class('req') }}
            <ul class="check-list">
                @forelse($extras->where('name', 'appliance') as $key => $item)
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
    <h3>Exterior Features</h3>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Direction Faces')->class('req') }}
            {{ html()->select('direction_face', $extras->where('name', 'face')->pluck('value', 'id'), $property?->direction_face ?? old('direction_face'))->class('form-control')->placeholder('Select') }}
            @error('direction_face')
            <small class="text-danger">{{ $errors->first('direction_face') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('No. of Floors')->class('req') }}
            {{ html()->number('number_of_floors', $property?->number_of_floors ?? old('number_of_floors'))->class('form-control')->placeholder('0') }}
            @error('number_of_floors')
            <small class="text-danger">{{ $errors->first('number_of_floors') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('No. of Garages')->class('req') }}
            {{ html()->number('number_of_garages', $property?->number_of_garages ?? old('number_of_garages'))->class('form-control')->placeholder('0') }}
            @error('number_of_garages')
            <small class="text-danger">{{ $errors->first('number_of_garages') }}</small>
            @enderror
        </div>
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