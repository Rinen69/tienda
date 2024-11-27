@extends('tablar::page')

@section('title', 'Seleccionar Productos para la Venta')

@section('content')
<div class="container-xl">
    <h2>Seleccionar Productos para la Venta</h2>
    <form action="{{ route('ventas.guardar', $registroVentaId) }}" method="POST" id="venta-form">
        @csrf
        <div id="productos-container">
            <div class="producto-item">
                <div class="row">
                    <div class="col-md-6">
                        <label for="producto-0">Artículo</label>
                        <select name="productos[0][articulo_id]" id="producto-0" class="form-control" required>
                            <option value="">Seleccione un artículo</option>
                            @foreach ($productosEnStock as $producto)
                                <option value="{{ $producto->id }}">
                                    {{ $producto->descripcion }} (Costo: ${{ number_format($producto->stocks->costo, 2) }}, Stock: {{ $producto->stocks->cantidad }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="cantidad-0">Cantidad</label>
                        <input type="number" name="productos[0][piezas]" id="cantidad-0" class="form-control" min="1" placeholder="Cantidad" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-success btn-add-producto">+</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar Venta</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productosContainer = document.getElementById('productos-container');
        let productoIndex = 1;

        // Agregar un nuevo producto
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('btn-add-producto')) {
                const nuevoProducto = document.createElement('div');
                nuevoProducto.classList.add('producto-item', 'mt-3');

                nuevoProducto.innerHTML = `
                    <div class="row">
                        <div class="col-md-6">
                            <label for="producto-${productoIndex}">Artículo</label>
                            <select name="productos[${productoIndex}][articulo_id]" id="producto-${productoIndex}" class="form-control" required>
                                <option value="">Seleccione un artículo</option>
                                @foreach ($productosEnStock as $producto)
                                    <option value="{{ $producto->id }}">
                                        {{ $producto->descripcion }} (Costo: ${{ number_format($producto->stocks->costo, 2) }}, Stock: {{ $producto->stocks->cantidad }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="cantidad-${productoIndex}">Cantidad</label>
                            <input type="number" name="productos[${productoIndex}][piezas]" id="cantidad-${productoIndex}" class="form-control" min="1" placeholder="Cantidad" required>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-remove-producto">-</button>
                        </div>
                    </div>
                `;

                productosContainer.appendChild(nuevoProducto);
                productoIndex++;
            }

            // Eliminar un producto
            if (event.target.classList.contains('btn-remove-producto')) {
                event.target.closest('.producto-item').remove();
            }
        });
    });
</script>
@endsection
