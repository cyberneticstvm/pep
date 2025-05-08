<div class="row">
    <h3>Project Details and Features</h3>
    <div class="col-lg-12 col-md-12">
        <div class="form-group">
            {{ html()->label()->text('Project Details and Features')->class('req') }}
            {{ html()->textarea('project_details', $property?->project_details ?? old('project_details'))->rows(10)->class('form-control')->placeholder('Project Details and Features') }}
            @error('project_details')
            <small class="text-danger">{{ $errors->first('project_details') }}</small>
            @enderror
        </div>
    </div>
</div>