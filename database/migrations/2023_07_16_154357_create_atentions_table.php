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
        Schema::create('atentions', function (Blueprint $table) {
            $table->id();
            $table->integer('paciente');
            $table->integer('especialista');

            $table->string('medioSolicitud');
            $table->integer('tipoConsulta');
            $table->integer('tipoCita');

            $table->date('fechaCita');
            $table->string('observaciones')->nullable();
            $table->integer('recepcion');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atentions');
    }
};
