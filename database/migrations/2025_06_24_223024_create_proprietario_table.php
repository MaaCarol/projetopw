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
    Schema::create('proprietario', function (Blueprint $table) {
        $table->id('id_proprietario'); // PK
        $table->string('nome', 255);
        $table->string('cpf', 14)->unique(); // CPF geralmente é UNIQUE
        $table->string('telefone', 20)->nullable(); // Pode ser nulo
        $table->string('email', 255)->unique(); // Email geralmente é UNIQUE
        $table->timestamps(); // created_at e updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietario');
    }
};
