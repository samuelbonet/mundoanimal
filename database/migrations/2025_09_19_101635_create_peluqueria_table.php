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
        Schema::create('peluquerias', function (Blueprint $table) {
            $table->id('id_peluqueria');
            $table->unsignedBigInteger('id_cliente'); // FK hacia clientes
            $table->dateTime('hora_corte');
            $table->string('tipo_corte', 50)->nullable(); 
            $table->boolean('bano')->default(false); 
            $table->text('observaciones')->nullable(); 
            $table->timestamps();

            // Clave foránea con tabla clientes
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peluquerias');
    }
};
