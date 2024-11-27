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
        Schema::create('registroventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Llave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relación con tabla users
            $table->date('fecha'); // Columna de fecha
            $table->time('hora'); // Columna de hora
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registroventas');
    }
};
