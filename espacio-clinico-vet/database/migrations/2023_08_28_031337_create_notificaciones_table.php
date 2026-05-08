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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('mensaje');
            $table->unsignedBigInteger('tipo');    
            $table->unsignedBigInteger('estado');
            $table->date('fecha_aviso');   
            $table->timestamps();
            $table->foreign('tipo')->references('id')->on('tipo_notificaciones');
            $table->foreign('estado')->references('id')->on('estado_notificaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
