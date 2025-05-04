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