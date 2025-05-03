<div class="add-listing-area mb-5">
    <div class="container">
        <div class="add-property-form agent-profile-information-tabs">
            {{ html()->form('POST', route('property.store'))->class('authentication-form')->attribute('id', 'frmProperty')->attribute('name', 'frmProperty')->acceptsFiles()->open() }}
            <input type="hidden" name="cat_id" value="{{ encrypt($category->id) }}" />
            <input type="hidden" name="property_id" id="property_id" value="{{ $property?->id ?? 0 }}" />
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview">Property Details</a></li>
                <li class="nav-item"><a class="nav-link" id="features-tab" data-bs-toggle="tab" href="#features" role="tab" aria-controls="features">Features</a></li>
                <li class="nav-item"><a class="nav-link" id="property-tab" data-bs-toggle="tab" href="#pricing" role="tab" aria-controls="pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#images" role="tab" aria-controls="images">Images</a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="overview" role="tabpanel">
                    <div class="row overview-content">
                        <h3>Property Details</h3>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                {{ html()->label()->text('Property Name / Title')->class('req') }}
                                {{ html()->text('name', $property?->name ?? old('name'))->class('form-control')->placeholder('Property Name / Title') }}
                                @error('name')
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                {{ html()->label()->text('Property Description')->class('req') }}
                                {{ html()->textarea('description', $property?->description ?? old('description'))->class('form-control')->placeholder('Property Description') }}
                                @error('description')
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text('Property Type')->class('req') }}
                                {{ html()->select('property_type', $extras->where('name', 'type')->where('category_id', $category->id)->pluck('value', 'id'), $property?->property_type ?? old('property_type'))->class('form-control')->placeholder('Select') }}
                                @error('property_type')
                                <small class="text-danger">{{ $errors->first('property_type') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text('Property Condition')->class('req') }}
                                {{ html()->select('property_condition', $extras->where('name', 'condition')->pluck('value', 'id'), $property?->property_condition ?? old('property_condition'))->class('form-control')->placeholder('Select') }}
                                @error('property_condition')
                                <small class="text-danger">{{ $errors->first('property_condition') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text('Property For')->class('req') }}
                                {{ html()->select('property_for', $extras->where('name', 'for')->pluck('value', 'id'), $property?->property_for ?? old('property_for'))->class('form-control')->placeholder('Select') }}
                                @error('property_for')
                                <small class="text-danger">{{ $errors->first('property_for') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text('Built Year')->class('req') }}
                                {{ html()->number('built_year', $property?->built_year ?? old('built_year'))->class('form-control')->placeholder('0000') }}
                                @error('built_year')
                                <small class="text-danger">{{ $errors->first('built_year') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                {{ html()->label()->text('Select Location')->class('req') }}
                                <!--{{ html()->text('location', old('location'))->class('form-control')->attribute('id', 'location')->placeholder('Location') }}-->
                                <div id="location"></div>
                                <input type="hidden" name="lat" id="lat" value="{{ $property?->lat ?? old('lat') }}" />
                                <input type="hidden" name="lng" id="lng" value="{{ $property?->lng ?? old('lng') }}" />
                                <input type="hidden" name="place_id" id="place_id" value="{{ $property?->place_id ?? old('place_id') }}" />
                                <input type="hidden" name="display_name" id="display_name" value="{{ $property?->display_name ?? old('display_name') }}" />
                                <input type="hidden" name="formatted_address" id="formatted_address" value="{{ $property?->formatted_address ?? old('formatted_address') }}" />
                                <input type="hidden" name="country_code" id="country_code" value="{{ $property?->country_code ?? old('country_code') }}" />
                                @error('formatted_address')
                                <small class="text-danger">{{ $errors->first('formatted_address') }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="features" role="tabpanel">
                    <div class="row">
                        <h3>Interior Features</h3>
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
                </div>
                <div class="tab-pane fade" id="pricing" role="tabpanel">
                    <div class="row">
                        <h3>Pricing and Other Info.</h3>
                        <div class="col-lg-2 col-md-2">
                            <div class="form-group">
                                {{ html()->label()->text('Price in USD')->class('req') }}
                                {{ html()->number('price', $property?->price ?? old('price'), 1, '', 1)->class('form-control')->placeholder('0') }}
                                @error('price')
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                {{ html()->label()->text('Other Info.')->class('req') }}
                                {{ html()->textarea('other_info', $property?->other_info ?? old('other_info'), 1, '', 1)->class('form-control')->rows(5)->placeholder('Other Info.') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="images" role="tabpanel">
                    <div class="comments-content">
                        <h2>Images</h2>
                        <small>Allowed height and width are 1020px and 1020px respectively. Max size is 1MB each and max limit is 10 images.</small>
                        <div class="dropzone mt-3"></div>
                    </div>
                </div>
                <div class="text-end mt-3">
                    {{ html()->button('Save & Continue')->attribute('type', 'button')->class("btn default-btn btn-add-property") }}
                </div>
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</div>