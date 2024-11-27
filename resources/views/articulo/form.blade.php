
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', $articulo->descripcion, ['class' => 'form-control' .
        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">articulo <b>descripcion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label for="contenido" class="form-label">Contenido</label>
    <input type="number" name="contenido" id="contenido" class="form-control" step="0.01" value="{{ old('contenido', $articulo->contenido ?? 0) }}" required>

</div>
<div class="form-group mb-3">
    <label for="barra" class="form-label">barra</label>
    <input type="number" name="barra" id="barra" class="form-control" step="0.01" value="{{ old('barra', $articulo->barra ?? 0) }}" required>

</div>
<!--
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('medida_id') }}</label>
    <div>
        {{ Form::text('medida_id', $articulo->medida_id, ['class' => 'form-control' .
        ($errors->has('medida_id') ? ' is-invalid' : ''), 'placeholder' => 'Medida Id']) }}
        {!! $errors->first('medida_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">articulo <b>medida_id</b> instruction.</small>
    </div>
</div> -->
<div class="form-group mb-3">
    <label for="medida_id" class="form-label">Seleccionar Medida</label>
    <select name="medida_id" id="medida_id" class="form-control" required>
        <option value="" selected disabled>-- Selecciona una medida --</option>
        @foreach ($medidas as $medida)
            <option value="{{ $medida->id }}">{{ $medida->descripcion }}</option>
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
