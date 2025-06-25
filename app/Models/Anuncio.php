<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $table = 'anuncio'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id_anuncio'; // Sua chave primária, se diferente de 'id'

    protected $fillable = [
        'titulo',
        'descricao',
        'preco',
        'data_publicacao',
        'id_proprietario', // Chaves estrangeiras também devem estar no fillable
        'id_veiculo',      // ou serem protegidas de outra forma
    ];

    // Definindo que a coluna 'data_publicacao' é uma data, se você quiser manipular como objeto Carbon
    protected $dates = ['data_publicacao'];


    // Relacionamento N para 1 com Proprietario (um Anuncio pertence a um Proprietario)
    public function proprietario()
    {
        // Um Anuncio pertence a um Proprietario
        // 'Proprietario::class' é o Model relacionado
        // 'id_proprietario' é a chave estrangeira nesta tabela 'anuncio'
        // 'id_proprietario' (segundo parâmetro) é a chave primária no Model 'Proprietario'
        return $this->belongsTo(Proprietario::class, 'id_proprietario');
    }

    // Relacionamento 1 para 1 com Veiculo (um Anuncio pertence a um Veiculo)
    public function veiculo()
    {
        // Um Anuncio pertence a um Veiculo
        // 'VeiculoModel::class' é o Model relacionado
        // 'id_veiculo' é a chave estrangeira nesta tabela 'anuncio'
        // 'id_veiculo' (segundo parâmetro) é a chave primária no Model 'VeiculoModel'
        return $this->belongsTo(VeiculoModel::class, 'id_veiculo');
    }
}