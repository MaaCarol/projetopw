<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('veiculo', function (Blueprint $table) {
            $table->id('id_veiculo'); 
            $table->string('marca', 255);
            $table->string('modelo', 255);
            $table->integer('ano');
            $table->string('placa', 255)->unique(); 
            $table->string('cor', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('veiculo');
    }
};