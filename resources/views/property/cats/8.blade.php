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
            {{ html()->label()->text('Architectural Style') }}
            {{ html()->select('architecture_style', $extras->where('category_id', $category->id)->where('name', 'h-arc')->pluck('value', 'id'), $property?->architecture_style ?? old('architecture_style'))->class('form-control')->placeholder('Select') }}
            @error('architecture_style')
            <small class="text-danger">{{ $errors->first('architecture_style') }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="form-group">
            {{ html()->label()->text('Construction & Material Highlights') }}
            {{ html()->select('construction_material', $extras->where('category_id', $category->id)->where('name', 'h-material')->pluck('value', 'id'), $property?->construction_material ?? old('construction_material'))->class('form-control')->placeholder('Select') }}
            @error('construction_material')
            <small class="text-danger">{{ $errors->first('construction_material') }}</small>
            @enderror
        </div>
    </div>
</div>