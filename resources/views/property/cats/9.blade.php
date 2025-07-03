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
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="form-group">
            {{ html()->label()->text('Project Details')->class('req') }}
            {{ html()->textarea('project_details', $property?->project_details ?? old('project_details'))->class('form-control')->placeholder('Project Details') }}
            @error('project_details')
            <small class="text-danger">{{ $errors->first('project_details') }}</small>
            @enderror
        </div>
    </div>
</div>