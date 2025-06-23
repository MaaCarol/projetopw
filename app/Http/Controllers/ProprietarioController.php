<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProprietarioController extends Controller
{
    /**
     * Exibe o formulário para criar um novo proprietário.
     * Corresponde à rota GET /proprietario/formulario
     *
     * @return \Illuminate\View\View
     */
    public function formulario()
    {
        return view('proprietario-formulario'); // Retorna a view 'proprietario-formulario'
    }

    /**
     * Armazena um novo proprietário no banco de dados.
     * Corresponde à rota POST /proprietario/store
     * (A lógica de salvar será implementada mais tarde)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // Lógica para validar e salvar o proprietário
    //     // Exemplo:
    //     // $validatedData = $request->validate([
    //     //     'nome' => 'required|string|max:255',
    //     //     'cpf' => 'required|string|max:14|unique:proprietarios', // Exemplo de validação de CPF
    //     //     'telefone' => 'nullable|string|max:20',
    //     //     'email' => 'required|email|unique:proprietarios',
    //     // ]);
    //     //
    //     // \App\Models\Proprietario::create($validatedData);
    //     //
    //     // return redirect()->route('proprietario-listar')->with('success', 'Proprietário cadastrado com sucesso!');
    // }

    /**
     * Exibe uma lista de proprietários.
     * Corresponde à rota GET /proprietario/listar
     * (A lógica de buscar e listar será implementada mais tarde)
     *
     * @return \Illuminate\View\View
     */
    // public function listar()
    // {
    //     // Lógica para buscar os proprietários no banco de dados
    //     // Exemplo:
    //     // $proprietarios = \App\Models\Proprietario::all();
    //     // return view('proprietario-listar', compact('proprietarios'));
    // }

    /**
     * Exibe o formulário para editar um proprietário específico.
     * Corresponde à rota GET /proprietario/editar/{id}
     * (A lógica de buscar o proprietário para edição será implementada mais tarde)
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    // public function editar($id)
    // {
    //     // Lógica para buscar o proprietário pelo ID
    //     // Exemplo:
    //     // $proprietario = \App\Models\Proprietario::findOrFail($id);
    //     // return view('proprietario-editar', compact('proprietario'));
    // }

    /**
     * Remove um proprietário do banco de dados.
     * Corresponde à rota DELETE /proprietario/remover/{id}
     * (A lógica de remover será implementada mais tarde)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function remover($id)
    // {
    //     // Lógica para remover o proprietário
    //     // Exemplo:
    //     // $proprietario = \App\Models\Proprietario::findOrFail($id);
    //     // $proprietario->delete();
    //     // return redirect()->route('proprietario-listar')->with('success', 'Proprietário removido com sucesso!');
    // }
}