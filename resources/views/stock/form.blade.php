
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('articulo_id') }}</label>
    <div>
        {{ Form::text('articulo_id', $stock->articulo_id, ['class' => 'form-control' .
        ($errors->has('articulo_id') ? ' is-invalid' : ''), 'placeholder' => 'Articulo Id']) }}
        {!! $errors->first('articulo_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">stock <b>articulo_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cantidad') }}</label>
    <div>
        {{ Form::text('cantidad', $stock->cantidad, ['class' => 'form-control' .
        ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
        {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">stock <b>cantidad</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('costo') }}</label>
    <div>
        {{ Form::text('costo', $stock->costo, ['class' => 'form-control' .
        ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo']) }}
        {!! $errors->first('costo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">stock <b>costo</b> instruction.</small>
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
