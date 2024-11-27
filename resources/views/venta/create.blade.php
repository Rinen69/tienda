@extends('tablar::page')

@section('title', 'Create Venta')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Create
                    </div>
                    <h2 class="page-title">
                        {{ __('Iniciar Nueva Venta') }}
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('ventas.index') }}" class="btn btn-primary">
                            Lista de Ventas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Iniciar Venta</h3>
                </div>
                <div class="card-body">
                    <!-- Botón para crear un registro de venta -->
                    <form action="{{ route('ventas.crear') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            Iniciar Venta
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
