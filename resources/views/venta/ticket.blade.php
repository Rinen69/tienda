<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ticket de Venta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .text-center {
            text-align: center;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 5px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="text-left">
        <h2>Tienda Flores</h2>
        <p>Dirección:</p>
        <p>Tel: 555-555-555</p>
        <p><strong>Ticket #{{ $registroVenta->id }}</strong></p>
    </div>

    <p><strong>Fecha:</strong> {{ $registroVenta->fecha }}</p>
    <p><strong>Hora:</strong> {{ $registroVenta->hora }}</p>
    <p><strong>Usuario:</strong> {{ $registroVenta->user->name ?? 'N/A' }}</p>

    <table class="table">
        <thead>
            <tr>
                <th>Artículo</th>
                <th>Cant</th>
                <th>C.U</th>
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
                    <td>{{ $venta->articulo->descripcion ?? 'N/A' }}</td>
                    <td>{{ $venta->piezas }}</td>
                    <td>${{ number_format($costoUnitario, 2) }}</td>
                    <td>${{ number_format($totalProducto, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="text-center">
        <strong>Total:</strong> ${{ number_format($totalVenta, 2) }}
    </p>

    <p class="text-center">
        ¡Gracias por su compra!
    </p>
</body>
</html>
