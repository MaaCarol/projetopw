<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::create('proprietario', function (Blueprint $table) {
        $table->id('id_proprietario'); // PK
        $table->string('nome', 255);
        $table->string('cpf', 14)->unique(); 
        $table->string('telefone', 20)->nullable(); 
        $table->string('email', 255)->unique(); 
        $table->timestamps(); 
    });
}

   
    public function down(): void
    {
        Schema::dropIfExists('proprietario');
    }
};
