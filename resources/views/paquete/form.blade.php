
<div class="form-group mb-3">
 <label for="articulo_id" class="form-label">Seleccionar articulo</label>
    <select name="articulo_id" id="articulo_id" class="form-control" required>
        <option value="" selected disabled>-- Selecciona una articulo --</option>
        @foreach ($articulos as $articulo)
            <option value="{{ $articulo->id }}">{{ $articulo->descripcion }} {{ $articulo->contenido}} de  {{ $articulo->medida->descripcion }}</option>
        @endforeach
    </select> 
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cantidad') }}</label>
    <div>
        {{ Form::text('cantidad', $paquete->cantidad, ['class' => 'form-control' .
        ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
        {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">paquete <b>cantidad</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('costo') }}</label>
    <div>
        {{ Form::text('costo', $paquete->costo, ['class' => 'form-control' .
        ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo']) }}
        {!! $errors->first('costo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">paquete <b>costo</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
<label class="form-label">{{ Form::label('fecha_exp') }}</label>
<div>
    {{ Form::date('fecha_exp', $paquete->fecha_exp, ['class' => 'form-control' . ($errors->has('fecha_exp') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Exp']) }}
    {!! $errors->first('fecha_exp', '<div class="invalid-feedback">:message</div>') !!}
    <small class="form-hint">Paquete <b>fecha_exp</b> instruction.</small>
</div>

</div>
<div class="form-group mb-3">
 <label for="proveedor_id" class="form-label">Seleccionar proveedor</label>
    <select name="proveedor_id" id="proveedor_id" class="form-control" required>
        <option value="" selected disabled>-- Selecciona una proveedor --</option>
        @foreach ($proveedors as $proveedor)
            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }} {{ $proveedor->ap }} {{ $proveedor->am }}-{{ $proveedor->compania->descripcion }}</option>
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
