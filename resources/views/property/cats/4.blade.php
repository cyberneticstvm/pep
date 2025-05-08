<div class="row">
    <h3>General</h3>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Area / Lot Size (Sq.Ft)')->class('req') }}
            {{ html()->number('square_feet', $property?->square_feet ?? old('square_feet'))->class('form-control')->placeholder('0') }}
            @error('square_feet')
            <small class="text-danger">{{ $errors->first('square_feet') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Soil Type / Quality')->class('req') }}
            {{ html()->text('soil_type', $property?->soil_type ?? old('soil_type'))->class('form-control')->placeholder('Soil Type / Quality') }}
            @error('soil_type')
            <small class="text-danger">{{ $errors->first('soil_type') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Topography')->class('req') }}
            {{ html()->select('topography', $extras->where('name', 'topography')->where('category_id', $category->id)->pluck('value', 'id'), $property?->topography ?? old('topography'))->class('form-control')->placeholder('Select') }}
            @error('topography')
            <small class="text-danger">{{ $errors->first('topography') }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row mt-3">
    <h3>Utilities & Infrastructure</h3>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Water Access')->class('req') }}
            {{ html()->select('water_access', $extras->where('name', 'water')->pluck('value', 'id'), $property?->water_access ?? old('water_access'))->class('form-control')->placeholder('Select') }}
            @error('water_access')
            <small class="text-danger">{{ $errors->first('water_access') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Sewer/Septic')->class('req') }}
            {{ html()->select('sewer', $extras->where('name', 'sewer')->pluck('value', 'id'), $property?->sewer ?? old('sewer'))->class('form-control')->placeholder('Select') }}
            @error('sewer')
            <small class="text-danger">{{ $errors->first('sewer') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Road Access')->class('req') }}
            {{ html()->select('road_access', $extras->where('name', 'road')->pluck('value', 'id'), $property?->road_access ?? old('road_access'))->class('form-control')->placeholder('Select') }}
            @error('road_access')
            <small class="text-danger">{{ $errors->first('road_access') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Electricity Access')->class('req') }}
            {{ html()->select('electricity_access', $extras->where('name', 'has')->pluck('value', 'id'), $property?->electricity_access ?? old('electricity_access'))->class('form-control')->placeholder('Select') }}
            @error('electricity_access')
            <small class="text-danger">{{ $errors->first('electricity_access') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Gas Availability')->class('req') }}
            {{ html()->select('gas_availability', $extras->where('name', 'has')->pluck('value', 'id'), $property?->gas_availability ?? old('gas_availability'))->class('form-control')->placeholder('Select') }}
            @error('gas_availability')
            <small class="text-danger">{{ $errors->first('gas_availability') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Internet Availability')->class('req') }}
            {{ html()->select('internet_availability', $extras->where('name', 'has')->pluck('value', 'id'), $property?->internet_availability ?? old('internet_availability'))->class('form-control')->placeholder('Select') }}
            @error('internet_availability')
            <small class="text-danger">{{ $errors->first('internet_availability') }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row mt-3">
    <h3>Natural Features & Views</h3>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Waterfront Access')->class('req') }}
            {{ html()->select('water_front_access', $extras->where('name', 'water_front')->pluck('value', 'id'), $property?->water_front_access ?? old('water_front_access'))->class('form-control')->placeholder('Select') }}
            @error('water_front_access')
            <small class="text-danger">{{ $errors->first('water_front_access') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
        <div class="form-group">
            {{ html()->label()->text('Trees/Wooded Areas')->class('req') }}
            {{ html()->select('tree_area', $extras->where('name', 'has')->pluck('value', 'id'), $property?->tree_area ?? old('tree_area'))->class('form-control')->placeholder('Select') }}
            @error('tree_area')
            <small class="text-danger">{{ $errors->first('tree_area') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Mountain or Scenic Views')->class('req') }}
            {{ html()->select('mountain_area', $extras->where('name', 'has')->pluck('value', 'id'), $property?->mountain_area ?? old('mountain_area'))->class('form-control')->placeholder('Select') }}
            @error('mountain_area')
            <small class="text-danger">{{ $errors->first('mountain_area') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Flood Zone Status')->class('req') }}
            {{ html()->select('flood_zone', $extras->where('name', 'has')->pluck('value', 'id'), $property?->flood_zone ?? old('flood_zone'))->class('form-control')->placeholder('Select') }}
            @error('flood_zone')
            <small class="text-danger">{{ $errors->first('flood_zone') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Wetlands or Protected Areas')->class('req') }}
            {{ html()->select('wetland', $extras->where('name', 'has')->pluck('value', 'id'), $property?->wetland ?? old('wetland'))->class('form-control')->placeholder('Select') }}
            @error('wetland')
            <small class="text-danger">{{ $errors->first('wetland') }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row mt-3">
    <h3>Nearby Amenities & Access</h3>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Distance to Nearest Town/City')->class('req') }}
            {{ html()->number('distance_to_nearest_city', $property?->distance_to_nearest_city ?? old('distance_to_nearest_city'))->class('form-control')->placeholder('0') }}
            @error('distance_to_nearest_city')
            <small class="text-danger">{{ $errors->first('distance_to_nearest_city') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Proximity to Schools, Hospitals')->class('req') }}
            {{ html()->text('proximity_to_school_hospital', $property?->proximity_to_school_hospital ?? old('proximity_to_school_hospital'))->class('form-control')->placeholder('Proximity to Schools, Hospitals') }}
            @error('proximity_to_school_hospital')
            <small class="text-danger">{{ $errors->first('proximity_to_school_hospital') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Nearby Highways or Interstates')->class('req') }}
            {{ html()->text('nearby_highways', $property?->nearby_highways ?? old('nearby_highways'))->class('form-control')->placeholder('Nearby Highways or Interstates') }}
            @error('nearby_highways')
            <small class="text-danger">{{ $errors->first('nearby_highways') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Public Land Nearby (parks, forests)')->class('req') }}
            {{ html()->text('public_lands_nearby', $property?->public_lands_nearby ?? old('public_lands_nearby'))->class('form-control')->placeholder('Public Land Nearby (parks, forests)') }}
            @error('public_lands_nearby')
            <small class="text-danger">{{ $errors->first('public_lands_nearby') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Shopping or Commercial Areas Nearby')->class('req') }}
            {{ html()->text('shopping_nearby', $property?->shopping_nearby ?? old('shopping_nearby'))->class('form-control')->placeholder('Shopping or Commercial Areas') }}
            @error('shopping_nearby')
            <small class="text-danger">{{ $errors->first('shopping_nearby') }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row mt-3">
    <h3>Legal & Ownership</h3>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Title Status (Clear, Encumbered)')->class('req') }}
            {{ html()->text('title_status', $property?->title_status ?? old('title_status'))->class('form-control')->placeholder('Title Status (Clear, Encumbered)') }}
            @error('title_status')
            <small class="text-danger">{{ $errors->first('title_status') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Deed Type')->class('req') }}
            {{ html()->text('deed_type', $property?->deed_type ?? old('deed_type'))->class('form-control')->placeholder('Deed Type') }}
            @error('deed_type')
            <small class="text-danger">{{ $errors->first('deed_type') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Mineral Rights')->class('req') }}
            {{ html()->text('mineral_rights', $property?->mineral_rights ?? old('mineral_rights'))->class('form-control')->placeholder('Mineral Rights') }}
            @error('mineral_rights')
            <small class="text-danger">{{ $errors->first('mineral_rights') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Easements or Right of Ways')->class('req') }}
            {{ html()->text('easement', $property?->easement ?? old('easement'))->class('form-control')->placeholder('Easements or Right of Ways') }}
            @error('easement')
            <small class="text-danger">{{ $errors->first('easement') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Current Taxes')->class('req') }}
            {{ html()->text('current_taxes', $property?->current_taxes ?? old('current_taxes'))->class('form-control')->placeholder('Current Taxes') }}
            @error('current_taxes')
            <small class="text-danger">{{ $errors->first('current_taxes') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Zoning Verification Docs')->class('req') }}
            {{ html()->text('zone_verification_docs', $property?->zone_verification_docs ?? old('zone_verification_docs'))->class('form-control')->placeholder('Zoning Verification Docs') }}
            @error('zone_verification_docs')
            <small class="text-danger">{{ $errors->first('zone_verification_docs') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="form-group">
            {{ html()->label()->text('Environmental Restrictions')->class('req') }}
            {{ html()->text('environmental_restrictions', $property?->environmental_restrictions ?? old('environmental_restrictions'))->class('form-control')->placeholder('Environmental Restrictions') }}
            @error('environmental_restrictions')
            <small class="text-danger">{{ $errors->first('environmental_restrictions') }}</small>
            @enderror
        </div>
    </div>
</div>