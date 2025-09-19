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
        Schema::create('citas', function (Blueprint $table) {
            $table->id('id_cita'); 
            $table->unsignedBigInteger('id_cliente'); // FK hacia clientes
            $table->string('telefono', 20);
            $table->dateTime('fecha_aplicacion');
            $table->string('motivo_cita', 100)->nullable();
            $table->timestamps();

            // Clave foránea con tabla clientes
            $table->foreign('id_cliente')
                  ->references('id_cliente')
                  ->on('clientes')
                  ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
