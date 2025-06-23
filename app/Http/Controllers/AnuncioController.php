<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    /**
     * Exibe o formulário para criar um novo anúncio.
     * Corresponde à rota GET /anuncio/formulario
     *
     * @return \Illuminate\View\View
     */
    public function formulario()
    {
        return view('anuncio-formulario'); // Retorna a view 'anuncio-formulario'
    }

    /**
     * Armazena um novo anúncio no banco de dados.
     * Corresponde à rota POST /anuncio/store
     * (A lógica de salvar será implementada mais tarde)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // Lógica para validar e salvar o anúncio
    //     // Exemplo:
    //     // $validatedData = $request->validate([
    //     //     'titulo' => 'required|string|max:255',
    //     //     'descricao' => 'nullable|string',
    //     //     'preco' => 'required|numeric',
    //     //     'data_publicacao' => 'required|date',
    //     //     'id_proprietario' => 'required|integer|exists:proprietarios,id_proprietario', // Verifica se o ID existe na tabela proprietarios
    //     //     'id_veiculo' => 'required|integer|exists:veiculos,id_veiculo', // Verifica se o ID existe na tabela veiculos
    //     // ]);
    //     //
    //     // \App\Models\Anuncio::create($validatedData);
    //     //
    //     // return redirect()->route('anuncio-listar')->with('success', 'Anúncio publicado com sucesso!');
    // }

    /**
     * Exibe uma lista de anúncios.
     * Corresponde à rota GET /anuncio/listar
     * (A lógica de buscar e listar será implementada mais tarde)
     *
     * @return \Illuminate\View\View
     */
    // public function listar()
    // {
    //     // Lógica para buscar os anúncios no banco de dados
    //     // Exemplo:
    //     // $anuncios = \App\Models\Anuncio::all();
    //     // return view('anuncio-listar', compact('anuncios'));
    // }

    /**
     * Exibe o formulário para editar um anúncio específico.
     * Corresponde à rota GET /anuncio/editar/{id}
     * (A lógica de buscar o anúncio para edição será implementada mais tarde)
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    // public function editar($id)
    // {
    //     // Lógica para buscar o anúncio pelo ID
    //     // Exemplo:
    //     // $anuncio = \App\Models\Anuncio::findOrFail($id);
    //     // return view('anuncio-editar', compact('anuncio'));
    // }

    /**
     * Remove um anúncio do banco de dados.
     * Corresponde à rota DELETE /anuncio/remover/{id}
     * (A lógica de remover será implementada mais tarde)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function remover($id)
    // {
    //     // Lógica para remover o anúncio
    //     // Exemplo:
    //     // $anuncio = \App\Models\Anuncio::findOrFail($id);
    //     // $anuncio->delete();
    //     // return redirect()->route('anuncio-listar')->with('success', 'Anúncio removido com sucesso!');
    // }
}