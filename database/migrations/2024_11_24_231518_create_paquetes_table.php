<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articulo_id'); // Llave foránea
            $table->integer('cantidad');
            $table->double('costo');
            $table->date('fecha_exp');
            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('cascade');
            $table->foreign('proveedor_id')->references('id')->on('proveedors')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquetes');
    }
};
