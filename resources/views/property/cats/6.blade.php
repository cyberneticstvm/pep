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
                                {{ html()->label()->text('Grand Foyer / Double-Height Entry')->class('req') }}
                                {{ html()->select('has_grand_foyer', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_grand_foyer ?? old('has_grand_foyer'))->class('form-control')->placeholder('Select') }}
                                @error('has_grand_foyer')
                                <small class="text-danger">{{ $errors->first('has_grand_foyer') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Chef's Kitchen with Premium Appliances")->class('req') }}
                                {{ html()->select('has_chef_kitchen', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_chef_kitchen ?? old('has_chef_kitchen'))->class('form-control')->placeholder('Select') }}
                                @error('has_chef_kitchen')
                                <small class="text-danger">{{ $errors->first('has_chef_kitchen') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Custom Cabinetry & Stone Countertops")->class('req') }}
                                {{ html()->select('has_custom_cabinetry', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_custom_cabinetry ?? old('has_custom_cabinetry'))->class('form-control')->placeholder('Select') }}
                                @error('has_custom_cabinetry')
                                <small class="text-danger">{{ $errors->first('has_custom_cabinetry') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Home Theater / Cinema Room")->class('req') }}
                                {{ html()->select('has_home_theater', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_home_theater ?? old('has_home_theater'))->class('form-control')->placeholder('Select') }}
                                @error('has_home_theater')
                                <small class="text-danger">{{ $errors->first('has_home_theater') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Wine Cellar / Tasting Room")->class('req') }}
                                {{ html()->select('has_wine_cellar', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_wine_cellar ?? old('has_wine_cellar'))->class('form-control')->placeholder('Select') }}
                                @error('has_wine_cellar')
                                <small class="text-danger">{{ $errors->first('has_wine_cellar') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Spa-Inspired Bathrooms")->class('req') }}
                                {{ html()->select('has_spa_bath', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_spa_bath ?? old('has_spa_bath'))->class('form-control')->placeholder('Select') }}
                                @error('has_spa_bath')
                                <small class="text-danger">{{ $errors->first('has_spa_bath') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Private Gym or Fitness Studio")->class('req') }}
                                {{ html()->select('has_private_gym', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_private_gym ?? old('has_private_gym'))->class('form-control')->placeholder('Select') }}
                                @error('has_private_gym')
                                <small class="text-danger">{{ $errors->first('has_private_gym') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Smart Home Automation Systems")->class('req') }}
                                {{ html()->select('has_smart_home_automation', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_smart_home_automation ?? old('has_smart_home_automation'))->class('form-control')->placeholder('Select') }}
                                @error('has_smart_home_automation')
                                <small class="text-danger">{{ $errors->first('has_smart_home_automation') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Smart Home Automation Systems")->class('req') }}
                                {{ html()->select('has_smart_home_automation', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_smart_home_automation ?? old('has_smart_home_automation'))->class('form-control')->placeholder('Select') }}
                                @error('has_smart_home_automation')
                                <small class="text-danger">{{ $errors->first('has_smart_home_automation') }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <h3>Outdoor Features</h3>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Infinity Pool / Resort-Style Pool")->class('req') }}
                                {{ html()->select('has_infinity_pool', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_infinity_pool ?? old('has_infinity_pool'))->class('form-control')->placeholder('Select') }}
                                @error('has_infinity_pool')
                                <small class="text-danger">{{ $errors->first('has_infinity_pool') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Outdoor Kitchen & BBQ Pavilion")->class('req') }}
                                {{ html()->select('has_outdoor_kitchen', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_outdoor_kitchen ?? old('has_outdoor_kitchen'))->class('form-control')->placeholder('Select') }}
                                @error('has_outdoor_kitchen')
                                <small class="text-danger">{{ $errors->first('has_outdoor_kitchen') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Landscaped Gardens & Water Features")->class('req') }}
                                {{ html()->select('has_landscaped_garden', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_landscaped_garden ?? old('has_landscaped_garden'))->class('form-control')->placeholder('Select') }}
                                @error('has_landscaped_garden')
                                <small class="text-danger">{{ $errors->first('has_landscaped_garden') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Rooftop Terrace / Sky Lounge")->class('req') }}
                                {{ html()->select('has_rooftop_terrace', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_rooftop_terrace ?? old('has_rooftop_terrace'))->class('form-control')->placeholder('Select') }}
                                @error('has_rooftop_terrace')
                                <small class="text-danger">{{ $errors->first('has_rooftop_terrace') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Private Tennis or Sports Courts")->class('req') }}
                                {{ html()->select('has_tennis_court', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_tennis_court ?? old('has_tennis_court'))->class('form-control')->placeholder('Select') }}
                                @error('has_tennis_court')
                                <small class="text-danger">{{ $errors->first('has_tennis_court') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Guest House / Casita")->class('req') }}
                                {{ html()->select('has_guest_house', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_guest_house ?? old('has_guest_house'))->class('form-control')->placeholder('Select') }}
                                @error('has_guest_house')
                                <small class="text-danger">{{ $errors->first('has_guest_house') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Outdoor Fire Pit or Fireplace")->class('req') }}
                                {{ html()->select('has_outdoor_fire_place', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_outdoor_fire_place ?? old('has_outdoor_fire_place'))->class('form-control')->placeholder('Select') }}
                                @error('has_outdoor_fire_place')
                                <small class="text-danger">{{ $errors->first('has_outdoor_fire_place') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Covered Patios & Lounging Areas")->class('req') }}
                                {{ html()->select('has_lounging_area', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_lounging_area ?? old('has_lounging_area'))->class('form-control')->placeholder('Select') }}
                                @error('has_lounging_area')
                                <small class="text-danger">{{ $errors->first('has_lounging_area') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Gated Driveway with Motor Court")->class('req') }}
                                {{ html()->select('has_gated_driveway', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_gated_driveway ?? old('has_gated_driveway'))->class('form-control')->placeholder('Select') }}
                                @error('has_gated_driveway')
                                <small class="text-danger">{{ $errors->first('has_gated_driveway') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="form-group">
                                {{ html()->label()->text("Panoramic Views  (city skyline, ocean, mountains, etc.)")->class('req') }}
                                {{ html()->select('has_panoramic_view', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_panoramic_view ?? old('has_panoramic_view'))->class('form-control')->placeholder('Select') }}
                                @error('has_panoramic_view')
                                <small class="text-danger">{{ $errors->first('has_panoramic_view') }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <h3>Security & Privacy</h3>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("24/7 Security Monitoring")->class('req') }}
                                {{ html()->select('has_security_monitoring', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_security_monitoring ?? old('has_security_monitoring'))->class('form-control')->placeholder('Select') }}
                                @error('has_security_monitoring')
                                <small class="text-danger">{{ $errors->first('has_security_monitoring') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Secure Safe Room / Panic Room")->class('req') }}
                                {{ html()->select('has_safe_room', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_safe_room ?? old('has_safe_room'))->class('form-control')->placeholder('Select') }}
                                @error('has_safe_room')
                                <small class="text-danger">{{ $errors->first('has_safe_room') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text("Privacy Hedges and Fencing")->class('req') }}
                                {{ html()->select('has_fencing', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_fencing ?? old('has_fencing'))->class('form-control')->placeholder('Select') }}
                                @error('has_fencing')
                                <small class="text-danger">{{ $errors->first('has_fencing') }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <h3>Technology & Sustainability</h3>
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
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text('Solar Panels / Energy-Efficient Systems')->class('req') }}
                                {{ html()->select('has_solar_panels', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_solar_panels ?? old('has_solar_panels'))->class('form-control')->placeholder('Select') }}
                                @error('has_solar_panels')
                                <small class="text-danger">{{ $errors->first('has_solar_panels') }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <h3>High-End Amenities</h3>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text('Helipad / Private Airstrip Access')->class('req') }}
                                {{ html()->select('has_helipad', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_helipad ?? old('has_helipad'))->class('form-control')->placeholder('Select') }}
                                @error('has_helipad')
                                <small class="text-danger">{{ $errors->first('has_helipad') }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                {{ html()->label()->text('Private Boat Dock')->class('req') }}
                                {{ html()->select('has_boat_dock', $extras->where('name', 'has')->pluck('value', 'id'), $property?->has_boat_dock ?? old('has_boat_dock'))->class('form-control')->placeholder('Select') }}
                                @error('has_boat_dock')
                                <small class="text-danger">{{ $errors->first('has_boat_dock') }}</small>
                                @enderror
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
                                {{ html()->textarea('other_info', $property?->other_info ?? old('other_info'))->class('form-control')->rows(5)->placeholder('Other Info.') }}
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