@extends('tablar::page')

@section('title', 'Lista de Ventas')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">{{ __('Ventas Registradas') }}</h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('venta.create') }}" class="btn btn-primary">Nueva Venta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ventas</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Artículo</th>
                            <th>Piezas</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ventas as $venta)
                            <tr>
                                <td>{{ $venta->id }}</td>
                                <td>{{ $venta->articulo->nombre ?? 'N/A' }}</td>
                                <td>{{ $venta->piezas }}</td>
                                <td>
                                    <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar esta venta?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $ventas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
