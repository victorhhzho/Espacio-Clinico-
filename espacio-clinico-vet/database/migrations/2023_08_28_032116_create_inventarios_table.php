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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('articulo');
            $table->unsignedBigInteger('proveedor');
            $table->unsignedBigInteger('tipo');
            $table->string('descripcion');
            $table->integer('unidades');
            $table->integer('unidades_min');
            $table->double('precio_vet');
            $table->double('precio_pub');
            $table->timestamps();
            $table->foreign('proveedor')->references('id')->on('proveedors');
            $table->foreign('tipo')->references('id')->on('tipo_articulos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
