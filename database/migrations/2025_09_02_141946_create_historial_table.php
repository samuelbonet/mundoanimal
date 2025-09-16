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
        Schema::create('historial', function (Blueprint $table) {
            $table->id('id_historial');
            $table->unsignedBigInteger('id_mascota');
            $table->date('fecha_aplicacion');
            $table->string('vacuna');
            $table->text('observacion')->nullable();
            $table->timestamps();

            $table->foreign('id_mascota')
                ->references('id_mascota')
                ->on('mascotas')
                ->onDelete('cascade');
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial');
    }
};
