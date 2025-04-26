@extends("base")
@section("content")
<div class="profile-authentication-area ptb-50">
    <div class="container">
        <div class="page-banner-content">
            <h2>Add Property</h2>
            <h4>Category - {{ $category->name }}</h4>
        </div>
    </div>
</div>
<div class="add-listing-area mb-5">
    <div class="container">
        <div class="add-property-form agent-profile-information-tabs">
            {{ html()->form('POST', route('property.store'))->class('authentication-form')->attribute('id', 'frmProperty')->acceptsFiles()->open() }}
            <input type="hidden" name="cat_id" value="{{ encrypt($category->id) }}" />
            <input type="hidden" name="property_id" id="property_id" value="{{ $property?->id > 0 ? encrypt($property?->id) : 0 }}" />
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
                    <div class="row justify-content-center">
                        <h3>Features</h3>
                    </div>
                </div>
                <div class="tab-pane fade" id="pricing" role="tabpanel">
                    <div class="row justify-content-center">
                        <h3>Pricing</h3>
                    </div>
                </div>
                <div class="tab-pane fade" id="images" role="tabpanel">
                    <div class="comments-content">
                        <h2>Images</h2>
                    </div>
                </div>
                <div class="text-end">
                    {{ html()->button($property?->id > 0 ? 'Update & Continue' : 'Save & Continue')->attribute('onclick', 'return validatePropertyForm()')->class("btn default-btn btn-add-property") }}
                </div>
            </div>
            <!--<div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        {{ html()->label()->text('Property Name / Title')->class('req') }}
                        {{ html()->text('name', old('name'))->class('form-control')->placeholder('Property Name / Title') }}
                        @error('name')
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        {{ html()->label()->text('Property Description')->class('req') }}
                        {{ html()->textarea('description', old('description'))->class('form-control')->placeholder('Property Description') }}
                        @error('description')
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <div class="mb-1 dropzone" id="document-dropzone">
                            <h6>Upload Multiple Images</h6>
                        </div>
                        {{ html()->span()->text('Upto 10 images with 1080px width and 1080px height, max 1MB size each. First image will be the featured image. Allowed formats are .jpg, .jpeg, .png, .webp')->class('text-primary') }}
                        @error('images')
                        <small class="text-danger">{{ $errors->first('images') }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-12 text-end">
                    {{ html()->submit("Submit for Review")->class("btn btn-primary btn-submit btn-add-property") }}
                </div>
            </div>-->
            {{ html()->form()->close() }}
        </div>
    </div>
</div>
@endsection