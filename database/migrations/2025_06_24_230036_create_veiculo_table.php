<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('veiculo', function (Blueprint $table) {
            $table->id('id_veiculo'); // CHAVE PRIMÁRIA COM O NOME CORRETO
            $table->string('marca', 255);
            $table->string('modelo', 255);
            $table->integer('ano');
            $table->string('placa', 255)->unique(); // Placa deve ser única
            $table->string('cor', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('veiculo');
    }
};