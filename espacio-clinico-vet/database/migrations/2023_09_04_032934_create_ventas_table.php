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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->unsignedBigInteger('paciente');
            $table->unsignedBigInteger('servicio');
            $table->string('descripcion');
            $table->unsignedBigInteger('metodo_pago');
            $table->unsignedBigInteger('estado_pago');
            $table->double('monto');
            $table->double('adeudo');
            $table->timestamps();
            $table->foreign('estado_pago')->references('id')->on('estado_pagos');
            $table->foreign('metodo_pago')->references('id')->on('metodo_pagos');
            $table->foreign('servicio')->references('id')->on('servicios');
            $table->foreign('paciente')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
