@extends('tablar::page')

@section('title', 'Actualizar Venta')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Update
                    </div>
                    <h2 class="page-title">
                        {{ __('Actualizar Venta') }}
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
                    <h3 class="card-title">Actualizar Detalles de Venta</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('ventas.update', $venta->id) }}">
                        {{ method_field('PATCH') }}
                        @csrf
                        @include('venta.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
