<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    use HasFactory;

    // Nome da tabela, se for diferente do plural do nome do modelo (o Laravel pluraliza para 'proprietarios')
    protected $table = 'proprietario';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email'
    ];

    // Se sua chave primária não for 'id' ou não for auto-incrementável
    // protected $primaryKey = 'id_proprietario';
    // public $incrementing = true; // Ou false se não for auto-incrementável
    // protected $keyType = 'string'; // Ou int
}