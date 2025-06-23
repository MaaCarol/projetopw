<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Exibe o formulário para criar um novo veículo.
     * Corresponde à rota GET /veiculo/formulario
     *
     * @return \Illuminate\View\View
     */
    public function formulario()
    {
        return view('veiculo-formulario');
    }

    /**
     * Armazena um novo veículo no banco de dados.
     * Corresponde à rota POST /veiculo/store
     * (A lógica de salvar será implementada mais tarde)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // Lógica para validar e salvar o veículo
    // }

    /**
     * Exibe uma lista de veículos.
     * Corresponde à rota GET /veiculo/listar
     * (A lógica de buscar e listar será implementada mais tarde)
     *
     * @return \Illuminate\View\View
     */
    // public function listar()
    // {
    //     // Lógica para buscar os veículos no banco de dados
    // }

    /**
     * Exibe o formulário para editar um veículo específico.
     * Corresponde à rota GET /veiculo/editar/{id}
     * (A lógica de buscar o veículo para edição será implementada mais tarde)
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    // public function editar($id)
    // {
    //     // Lógica para buscar o veículo para edição
    // }

    /**
     * Remove um veículo do banco de dados.
     * Corresponde à rota DELETE /veiculo/remover/{id}
     * (A lógica de remover será implementada mais tarde)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function remover($id)
    // {
    //     // Lógica para remover o veículo
    // }
}