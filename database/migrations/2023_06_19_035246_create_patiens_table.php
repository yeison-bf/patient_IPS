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
        Schema::create('patiens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('second_name')->nullable();
            $table->string('surname');
            $table->string('second_Surname')->nullable();
            $table->string('document');
            $table->string('type_document');
            $table->string('expedition');
            $table->string('sex');
            $table->string('birth_date');
            $table->string('age');

            $table->string('pais');
            $table->string('city');
            $table->string('location')->nullable();
            $table->string('estrato');
            $table->string('celular');
            $table->string('telefono')->nullable();
            $table->string('email');
            $table->string('estadoCivil')->nullable();
            $table->string('regimen')->nullable();
            $table->string('eps');
            $table->integer('estado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patiens');
    }
};
