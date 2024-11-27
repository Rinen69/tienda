
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre') }}</label>
    <div>
        {{ Form::text('nombre', $proveedor->nombre, ['class' => 'form-control' .
        ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedor <b>nombre</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('ap') }}</label>
    <div>
        {{ Form::text('ap', $proveedor->ap, ['class' => 'form-control' .
        ($errors->has('ap') ? ' is-invalid' : ''), 'placeholder' => 'Ap']) }}
        {!! $errors->first('ap', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedor <b>ap</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('am') }}</label>
    <div>
        {{ Form::text('am', $proveedor->am, ['class' => 'form-control' .
        ($errors->has('am') ? ' is-invalid' : ''), 'placeholder' => 'Am']) }}
        {!! $errors->first('am', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedor <b>am</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
     <label for="compania_id" class="form-label">Seleccionar compania</label>
        <select name="compania_id" id="compania_id" class="form-control" required>
            <option value="" selected disabled>-- Selecciona una compania --</option>
            @foreach ($companias as $compania)
                <option value="{{ $compania->id }}" {{ old('compania_id', $proveedor->compania_id) == $compania->id ? 'selected' : '' }}>
                    {{ $compania->descripcion }}
                </option>
            @endforeach
        </select>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
