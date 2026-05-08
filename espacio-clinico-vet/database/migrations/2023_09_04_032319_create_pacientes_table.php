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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('pro_nombre')->nullable();
            $table->string('pro_apellidop')->nullable();
            $table->string('pro_apellidom')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('pro_observaciones')->nullable();

            $table->string('nombre');
            $table->unsignedBigInteger('especie');
            $table->unsignedBigInteger('raza');
            $table->unsignedBigInteger('sexo');
            $table->integer('edad')->nullable();
            $table->double('peso')->nullable();
            $table->string('color')->nullable();
            $table->string('alimentacion')->nullable();

            $table->date('ult_desp')->nullable();
            $table->date('v_puppy')->nullable();
            $table->date('v_quintuple')->nullable();
            $table->date('v_sextuple')->nullable();
            $table->date('v_giardia')->nullable();
            $table->date('v_bordetela')->nullable();
            $table->date('v_rabia')->nullable();
            $table->date('v_triplef')->nullable();
            $table->date('v_refuerzofe')->nullable();
            $table->date('v_leucemia')->nullable();
            $table->string('v_otros')->nullable();

            $table->string('prox_vacuna')->nullable();
            $table->date('fecha_prox_vacuna')->nullable();

            $table->string('cirugias')->nullable();
            $table->string('obs_estetica')->nullable();
            $table->string('obs_clinicas')->nullable();
            $table->string('obs_pension')->nullable();
            $table->string('ult_visita');

            $table->foreign('especie')->references('id')->on('especies');
            $table->foreign('raza')->references('id')->on('razas');
            $table->foreign('sexo')->references('id')->on('sexos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
