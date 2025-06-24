<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;     // Importe o Model Anuncio
use App\Models\Proprietario; // Importe o Model Proprietario
use App\Models\Veiculo;     // Importe o Model Veiculo

class AnuncioController extends Controller
{
    public function formulario()
    {
        $proprietarios = Proprietario::all(); // Pega todos os proprietários
        $veiculos = Veiculo::all(); // Pega todos os veículos
        return view('anuncio-formulario', compact('proprietarios', 'veiculos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0.01',
            'data_publicacao' => 'required|date',
            'id_proprietario' => 'required|exists:proprietario,id_proprietario', // Verifica se o ID existe na tabela
            'id_veiculo' => 'required|exists:veiculo,id_veiculo|unique:anuncio,id_veiculo', // Veículo só pode estar em 1 anúncio
        ], [
            'titulo.required' => 'O campo título é obrigatório.',
            'preco.required' => 'O campo preço é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número.',
            'preco.min' => 'O preço deve ser maior que zero.',
            'data_publicacao.required' => 'A data de publicação é obrigatória.',
            'data_publicacao.date' => 'A data de publicação deve ser uma data válida.',
            'id_proprietario.required' => 'Selecione um proprietário.',
            'id_proprietario.exists' => 'O proprietário selecionado não é válido.',
            'id_veiculo.required' => 'Selecione um veículo.',
            'id_veiculo.exists' => 'O veículo selecionado não é válido.',
            'id_veiculo.unique' => 'Este veículo já está associado a outro anúncio.'
        ]);

        Anuncio::create($request->all());

        return redirect('/anuncio/listar')->with('success', 'Anúncio cadastrado com sucesso!');
    }

    public function listar()
    {
        // Eager loading: Carrega Proprietario e Veiculo junto com os Anúncios para evitar N+1 query problem
        $anuncios = Anuncio::with(['proprietario', 'veiculo'])->get();
        return view('anuncio-listar', compact('anuncios'));
    }

    // ... Mantenha os métodos remover e editar por enquanto, não os altere ainda.
}