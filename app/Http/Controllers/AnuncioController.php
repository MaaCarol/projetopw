<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Proprietario;
use App\Models\VeiculoModel; 

class AnuncioController extends Controller
{
    
    public function formulario()
    {
        $proprietarios = Proprietario::all(); 
        $veiculos = VeiculoModel::all();     
        return view('anuncio-formulario', compact('proprietarios', 'veiculos'));
    }

    
    public function store(Request $dados)
    {
       
        $rules = [
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0.01',
            'data_publicacao' => 'required|date',
            'id_proprietario' => 'required|exists:proprietario,id_proprietario', 
            'id_veiculo' => 'required|exists:veiculo,id_veiculo',
        ];

       
        if (isset($dados->id) && !empty($dados->id)) {
            $rules['id_veiculo'] .= '|unique:anuncio,id_veiculo,' . $dados->id . ',id_anuncio';
        } else {
           
            $rules['id_veiculo'] .= '|unique:anuncio,id_veiculo';
        }


        $dados->validate($rules, [
            'titulo.required' => 'O campo título é obrigatório.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'preco.required' => 'O campo preço é obrigatório.',
            'preco.numeric' => 'O campo preço deve ser um número.',
            'preco.min' => 'O campo preço deve ser no mínimo :min.',
            'data_publicacao.required' => 'O campo data de publicação é obrigatório.',
            'data_publicacao.date' => 'O campo data de publicação deve ser uma data válida.',
            'id_proprietario.required' => 'O campo proprietário é obrigatório.',
            'id_proprietario.exists' => 'O proprietário selecionado não existe.',
            'id_veiculo.required' => 'O campo veículo é obrigatório.',
            'id_veiculo.exists' => 'O veículo selecionado não existe.',
            'id_veiculo.unique' => 'Este veículo já está cadastrado em outro anúncio.',
        ]);

        if (isset($dados->id) && !empty($dados->id)) {
        
            $anuncio = Anuncio::find($dados->id);
            if ($anuncio) {
                $anuncio->update($dados->all());
                return redirect()->route('anuncio-listar')->with('success', 'Anúncio atualizado com sucesso!');
            } else {
                return redirect()->route('anuncio-listar')->with('error', 'Anúncio não encontrado para atualização.');
            }
        } else {
            
            Anuncio::create($dados->all());
            return redirect()->route('anuncio-listar')->with('success', 'Anúncio cadastrado com sucesso!');
        }
    }

    
    public function listar()
    {
        
        $anuncios = Anuncio::with(['proprietario', 'veiculo'])->get();
        return view('anuncio-listar', compact('anuncios'));
    }

   
    public function editar($id)
    {
        $anuncio = Anuncio::with(['proprietario', 'veiculo'])->find($id);
        if (!$anuncio) {
            return redirect()->route('anuncio-listar')->with('error', 'Anúncio não encontrado para edição.');
        }
        $proprietarios = Proprietario::all();
        $veiculos = VeiculoModel::all();
        return view('anuncio-formulario', compact('anuncio', 'proprietarios', 'veiculos'));
    }

    
    public function remover($id)
    {
        $anuncio = Anuncio::find($id);
        if (!$anuncio) {
            return redirect()->route('anuncio-listar')->with('error', 'Anúncio não encontrado para remoção.');
        }
        $anuncio->delete();
        return redirect()->route('anuncio-listar')->with('success', 'Anúncio removido com sucesso!');
    }
}