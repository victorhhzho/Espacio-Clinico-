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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente');
            $table->unsignedBigInteger('tipo_consulta');
            $table->string('medico');
            $table->string('cedula');
            $table->date('fecha');

            $table->string('motivo');

            $table->string('anamnesis')->nullable();

            $table->string('temperatura')->nullable();
            $table->string('frecuencia_resp')->nullable();
            $table->string('campos_pulm')->nullable();
            $table->string('frecuencia_car')->nullable();
            $table->string('condicion_corp')->nullable();
            $table->string('porcentaje_desh')->nullable();
            $table->string('t_llenado_cap')->nullable();

            $table->string('hogar_animal')->nullable();
            $table->string('companeros')->nullable();
            $table->string('alimentacion')->nullable();
            $table->string('exp_enf_cont')->nullable();
            $table->string('enfermedades_act')->nullable();
            $table->string('tratamiento_act')->nullable();
            $table->string('reacciones_medicamentos')->nullable();

            $table->string('estado_fisio')->nullable();

            $table->string('list_prob')->nullable();

            $table->string('pruebas_rec')->nullable();
            $table->string('resultados')->nullable();
            
            $table->string('tratamiento')->nullable();
            
            $table->string('observaciones')->nullable();
            
            $table->date('proxima_cita')->nullable();
            
            $table->foreign('paciente')->references('id')->on('pacientes');
            $table->foreign('tipo_consulta')->references('id')->on('tipo_consultas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
