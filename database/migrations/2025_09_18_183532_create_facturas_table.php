<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('id_factura');               
            $table->unsignedBigInteger('id_cliente');// Relación con clientes
            $table->dateTime('fecha_emision');       
            $table->string('concepto', 255);       
            $table->decimal('precio', 10, 2);        
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
        Schema::dropIfExists('facturas');
    }
};
