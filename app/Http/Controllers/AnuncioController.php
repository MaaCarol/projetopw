<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Proprietario;
use App\Models\VeiculoModel; // Certifique-se que o nome do Model de Veículo está correto aqui

class AnuncioController extends Controller
{
    // Método para exibir o formulário de cadastro/edição de anúncio (Passo 17)
    public function formulario()
    {
        $proprietarios = Proprietario::all(); // Busca todos os proprietários
        $veiculos = VeiculoModel::all();     // Busca todos os veículos
        return view('anuncio-formulario', compact('proprietarios', 'veiculos'));
    }

    // Método para salvar (criar ou atualizar) um anúncio (Este é o método que estava com erro)
    public function store(Request $dados)
    {
        // Validação dos dados do anúncio, proprietário e veículo
        $rules = [
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0.01',
            'data_publicacao' => 'required|date',
            'id_proprietario' => 'required|exists:proprietario,id_proprietario', // Verifica se o proprietário existe
            'id_veiculo' => 'required|exists:veiculo,id_veiculo', // Verifica se o veículo existe
        ];

        // Lógica para a regra unique da placa, caso seja uma atualização
        // Se estiver atualizando, a placa pode ser a mesma do próprio anúncio que está sendo editado
        if (isset($dados->id) && !empty($dados->id)) {
            $rules['id_veiculo'] .= '|unique:anuncio,id_veiculo,' . $dados->id . ',id_anuncio';
        } else {
            // Se for criação, o veículo deve ser único entre todos os anúncios
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
            // Lógica de update
            $anuncio = Anuncio::find($dados->id);
            if ($anuncio) {
                $anuncio->update($dados->all());
                return redirect()->route('anuncio-listar')->with('success', 'Anúncio atualizado com sucesso!');
            } else {
                return redirect()->route('anuncio-listar')->with('error', 'Anúncio não encontrado para atualização.');
            }
        } else {
            // Lógica de criação
            Anuncio::create($dados->all());
            return redirect()->route('anuncio-listar')->with('success', 'Anúncio cadastrado com sucesso!');
        }
    }

    // Método para listar todos os anúncios (Passo 18)
    public function listar()
    {
        // Carrega os anúncios e "eager load" os relacionamentos proprietario e veiculo
        $anuncios = Anuncio::with(['proprietario', 'veiculo'])->get();
        return view('anuncio-listar', compact('anuncios'));
    }

    // Método para exibir o formulário de edição de um anúncio específico
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

    // Método para remover um anúncio
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