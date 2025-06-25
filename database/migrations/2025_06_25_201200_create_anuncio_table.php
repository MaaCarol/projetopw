<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
{
    Schema::create('anuncio', function (Blueprint $table) {
        $table->id('id_anuncio'); 
        $table->string('titulo', 255);
        $table->text('descricao')->nullable(); 
        $table->decimal('preco', 10, 2); 
        $table->timestamp('data_publicacao')->useCurrent(); 
        // Chaves estrangeiras
        $table->unsignedBigInteger('id_proprietario');
        $table->unsignedBigInteger('id_veiculo');
        $table->timestamps(); 

    
        $table->foreign('id_proprietario')->references('id_proprietario')->on('proprietario')->onDelete('cascade');
        $table->foreign('id_veiculo')->references('id_veiculo')->on('veiculo')->onDelete('cascade');
    });
}

  
    public function down(): void
    {
        Schema::dropIfExists('anuncio');
    }
};
