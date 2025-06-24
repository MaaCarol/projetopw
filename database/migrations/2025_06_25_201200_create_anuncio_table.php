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
    Schema::create('anuncio', function (Blueprint $table) {
        $table->id('id_anuncio'); // PK
        $table->string('titulo', 255);
        $table->text('descricao')->nullable(); // Texto longo, pode ser nulo
        $table->decimal('preco', 10, 2); // Preço com 10 dígitos no total, 2 após a vírgula
        $table->timestamp('data_publicacao')->useCurrent(); // Data e hora atual por padrão
        // Chaves estrangeiras
        $table->unsignedBigInteger('id_proprietario');
        $table->unsignedBigInteger('id_veiculo');
        $table->timestamps(); // created_at e updated_at

        // Definição das chaves estrangeiras
        $table->foreign('id_proprietario')->references('id_proprietario')->on('proprietario')->onDelete('cascade');
        $table->foreign('id_veiculo')->references('id_veiculo')->on('veiculo')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncio');
    }
};
