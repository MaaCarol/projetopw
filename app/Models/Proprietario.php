<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    use HasFactory;

    protected $table = 'proprietario'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id_proprietario'; // Sua chave primária, se diferente de 'id'

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'data_nascimento',
    ];

    // Relacionamento 1 para N com Anuncio
    public function anuncios()
    {
        // Um Proprietario tem muitos Anuncios
        // 'Anuncio::class' é o Model relacionado
        // 'id_proprietario' é a chave estrangeira na tabela 'anuncio' que referencia 'proprietario'
        return $this->hasMany(Anuncio::class, 'id_proprietario');
    }
}