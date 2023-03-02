<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Path Field -->
<div class="form-group col-sm-12">
    {!! Form::label('path', 'Path:') !!}
    {!! Form::file('path', null, ['class' => 'form-control-file']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.createfile.createfiles.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
