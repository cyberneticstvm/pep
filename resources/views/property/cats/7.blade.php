<div class="row">
    <h3>Features</h3>
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
            {{ html()->label()->text('Sustainable Design & Materials') }}
            {{ html()->select('sustainable_design', $extras->where('category_id', $category->id)->where('name', 'material')->pluck('value', 'id'), $property?->sustainable_design ?? old('sustainable_design'))->class('form-control')->placeholder('Select') }}
            @error('sustainable_design')
            <small class="text-danger">{{ $errors->first('sustainable_design') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Energy Efficiency') }}
            {{ html()->select('energy_efficiency', $extras->where('category_id', $category->id)->where('name', 'energy')->pluck('value', 'id')->prepend('Other', '157'), $property?->energy_efficiency ?? old('energy_efficiency'))->class('form-control')->placeholder('Select') }}
            @error('energy_efficiency')
            <small class="text-danger">{{ $errors->first('energy_efficiency') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Water Conservation') }}
            {{ html()->select('water_conservation', $extras->where('category_id', $category->id)->where('name', 'eco-water')->pluck('value', 'id')->prepend('Other', '157'), $property?->water_conservation ?? old('water_conservation'))->class('form-control')->placeholder('Select') }}
            @error('water_conservation')
            <small class="text-danger">{{ $errors->first('water_conservation') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Air Quality & Natural Ventilation') }}
            {{ html()->select('air_quality', $extras->where('category_id', $category->id)->where('name', 'air-quality')->pluck('value', 'id')->prepend('Other', '157'), $property?->air_quality ?? old('air_quality'))->class('form-control')->placeholder('Select') }}
            @error('air_quality')
            <small class="text-danger">{{ $errors->first('air_quality') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Eco-Conscious Living') }}
            {{ html()->select('eco_conscious', $extras->where('category_id', $category->id)->where('name', 'eco-conscious')->pluck('value', 'id')->prepend('Other', '157'), $property?->eco_conscious ?? old('eco_conscious'))->class('form-control')->placeholder('Select') }}
            @error('eco_conscious')
            <small class="text-danger">{{ $errors->first('eco_conscious') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Waste Reduction') }}
            {{ html()->select('waste_reduction', $extras->where('category_id', $category->id)->where('name', 'eco-waste')->pluck('value', 'id')->prepend('Other', '157'), $property?->waste_reduction ?? old('waste_reduction'))->class('form-control')->placeholder('Select') }}
            @error('waste_reduction')
            <small class="text-danger">{{ $errors->first('waste_reduction') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Certifications & Ratings') }}
            {{ html()->select('eco_cert_and_rate', $extras->where('category_id', $category->id)->where('name', 'eco-cert')->pluck('value', 'id')->prepend('Other', '157'), $property?->eco_cert_and_rate ?? old('eco_cert_and_rate'))->class('form-control')->placeholder('Select') }}
            @error('eco_cert_and_rate')
            <small class="text-danger">{{ $errors->first('eco_cert_and_rate') }}</small>
            @enderror
        </div>
    </div>
</div>