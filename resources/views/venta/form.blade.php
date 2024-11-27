<div class="form-group mb-3">
    <label class="form-label">Artículo</label>
    <div>
        {{ Form::select('articulo_id', $articulos, $venta->articulo_id ?? null, [
            'class' => 'form-control' . ($errors->has('articulo_id') ? ' is-invalid' : ''),
            'placeholder' => 'Selecciona un artículo',
        ]) }}
        {!! $errors->first('articulo_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Piezas</label>
    <div>
        {{ Form::number('piezas', $venta->piezas ?? 1, [
            'class' => 'form-control' . ($errors->has('piezas') ? ' is-invalid' : ''),
            'min' => 1,
        ]) }}
        {!! $errors->first('piezas', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('ventas.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto">Guardar</button>
        </div>
    </div>
</div>
