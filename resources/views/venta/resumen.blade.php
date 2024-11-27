@extends('tablar::page')

@section('title', 'Resumen de Venta')

@section('content')
<div class="container-xl">
    <h2>Resumen de la Venta</h2>
    <div class="card">
        <div class="card-header">
            <h3>Detalles de la Venta</h3>
        </div>
        <div class="card-body">
            <p><strong>Fecha:</strong> {{ $registroVenta->fecha }}</p>
            <p><strong>Hora:</strong> {{ $registroVenta->hora }}</p>
            <p><strong>Usuario:</strong> {{ $registroVenta->user->name ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h3>Productos Vendidos</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Artículo</th>
                        <th>Cantidad</th>
                        <th>Costo Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalVenta = 0; @endphp
                    @foreach ($registroVenta->ventas as $venta)
                        @php 
                            $costoUnitario = $venta->articulo->stocks->costo ?? 0;
                            $totalProducto = $venta->piezas * $costoUnitario;
                            $totalVenta += $totalProducto;
                        @endphp
                        <tr>
                            <td>{{ $venta->articulo->descripcion ?? 'Artículo no encontrado' }}</td>
                            <td>{{ $venta->piezas }}</td>
                            <td>${{ number_format($costoUnitario, 2) }}</td>
                            <td>${{ number_format($totalProducto, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h4><strong>Total General:</strong> ${{ number_format($totalVenta, 2) }}</h4>
            <div class="text-center mt-4">
                <!-- Botón para ver ticket -->
                <a href="{{ route('venta.ticket', $registroVenta->id) }}" class="btn btn-primary" target="_blank">
                    Ver Ticket
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
