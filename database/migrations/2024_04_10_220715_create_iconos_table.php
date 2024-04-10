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
        Schema::create('iconos', function (Blueprint $table) {
            $table->id('id_icono');
            $table->string('titulo_icono');
            $table->text('descripcion_icono');
            $table->string('icono');
            $table->unsignedBigInteger('id_icono_principal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iconos');
    }
};
