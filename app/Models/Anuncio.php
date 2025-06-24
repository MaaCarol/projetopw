<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $table = 'anuncio'; // Nome da sua tabela
    protected $primaryKey = 'id_anuncio'; // Nome da sua chave primária
    public $incrementing = true; // Se a PK é auto-incremento (sim, é)

    protected $fillable = [
        'titulo',
        'descricao',
        'preco',
        'data_publicacao',
        'id_proprietario', // Chave estrangeira
        'id_veiculo',      // Chave estrangeira
    ];

    // Um anúncio pertence a um proprietário
    public function proprietario()
    {
        return $this->belongsTo(Proprietario::class, 'id_proprietario', 'id_proprietario');
    }

    // Um anúncio pertence a um veículo
    public function veiculo()
    {
        return $this->belongsTo(VeiculoModel::class, 'id_veiculo', 'id_veiculo');
    }
}