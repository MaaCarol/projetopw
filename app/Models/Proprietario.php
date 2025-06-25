<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    use HasFactory;

    protected $table = 'proprietario';
    protected $primaryKey = 'id_proprietario'; 

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'data_nascimento',
    ];

    public function anuncios()
    {
       
        return $this->hasMany(Anuncio::class, 'id_proprietario');
    }
}