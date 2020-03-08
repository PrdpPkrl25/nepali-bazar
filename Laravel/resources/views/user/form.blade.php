<div class="form-group">
    {!! Form::label('ward_number', 'Ward number', ['class' => 'control-label']) !!}
    {!! Form::text('ward_number', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
</div>
<div class="form-group}">
    {!! Form::label('municipal_id', 'Municipal', ['class' => 'control-label']) !!}
    {!! Form::select('municipal_id', $municipality, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
