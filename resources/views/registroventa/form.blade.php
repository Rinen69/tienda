
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('user_id') }}</label>
    <div>
        {{ Form::text('user_id', $registroventa->user_id, ['class' => 'form-control' .
        ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">registroventa <b>user_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha') }}</label>
    <div>
        {{ Form::text('fecha', $registroventa->fecha, ['class' => 'form-control' .
        ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
        {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">registroventa <b>fecha</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('hora') }}</label>
    <div>
        {{ Form::text('hora', $registroventa->hora, ['class' => 'form-control' .
        ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
        {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">registroventa <b>hora</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
