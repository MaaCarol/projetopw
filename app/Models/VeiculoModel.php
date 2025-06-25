<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeiculoModel extends Model
{
    use HasFactory;

    protected $table = 'veiculo'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id_veiculo'; // Sua chave primária, se diferente de 'id'

    protected $fillable = [
        'marca',
        'modelo',
        'ano',
        'placa',
        'cor',
    ];

    // Relacionamento 1 para 1 com Anuncio
    public function anuncio()
    {
        // Um Veiculo tem um Anuncio
        // 'Anuncio::class' é o Model relacionado
        // 'id_veiculo' é a chave estrangeira na tabela 'anuncio' que referencia 'veiculo'
        return $this->hasOne(Anuncio::class, 'id_veiculo');
    }
}