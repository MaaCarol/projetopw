<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $table = 'anuncio'; 
    protected $primaryKey = 'id_anuncio'; 
    protected $fillable = [
        'titulo',
        'descricao',
        'preco',
        'data_publicacao',
        'id_proprietario', 
        'id_veiculo',      
    ];

    
    protected $dates = ['data_publicacao'];


    public function proprietario()
    {
     

        return $this->belongsTo(Proprietario::class, 'id_proprietario');
    }

    public function veiculo()
    {
      
        return $this->belongsTo(VeiculoModel::class, 'id_veiculo');
    }
}