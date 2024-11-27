@extends('tablar::page')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">


        
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>

                    @role('admin')
                    <h2 class="page-title">
                        Dashboard-Administrador
                    </h2>
                    @endrole

                    @role('caja')
                    <h2 class="page-title">
                        Dashboard-Caja
                    </h2>
                    @endrole
                    @role('inventario')
                    <h2 class="page-title">
                        Dashboard-Inventarioador
                    </h2>
                    @endrole
                </div>
                <!-- Page title actions -->
                <p>comentario public</P>
                @role('admin')
                <p>comentariop para admin</P>
                @endrole

                @role('caja')
                <p>comentario para cajaaaa</P>
                @endrole
                @role('inventario')
                <p>comentario para Inventario</P>
                @endrole
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        
    </div>
@endsection
