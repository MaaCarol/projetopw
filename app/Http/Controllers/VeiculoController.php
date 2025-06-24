<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo; // Importe o Model Veiculo

class VeiculoController extends Controller
{
    public function formulario()
    {
        return view('veiculo-formulario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1), // Ano válido
            'placa' => 'required|string|max:7|unique:veiculo,placa', // Placa única
            'cor' => 'required|string|max:255',
        ], [
            'marca.required' => 'O campo marca é obrigatório.',
            'modelo.required' => 'O campo modelo é obrigatório.',
            'ano.required' => 'O campo ano é obrigatório.',
            'ano.integer' => 'O campo ano deve ser um número inteiro.',
            'ano.min' => 'O ano mínimo permitido é 1900.',
            'ano.max' => 'O ano não pode ser no futuro distante.',
            'placa.required' => 'O campo placa é obrigatório.',
            'placa.unique' => 'Esta placa já está cadastrada.',
            'cor.required' => 'O campo cor é obrigatório.'
        ]);

        Veiculo::create($request->all());

        return redirect('/veiculo/listar')->with('success', 'Veículo cadastrado com sucesso!');
    }

    public function listar()
    {
        $veiculos = Veiculo::all(); // Busca todos os veículos
        return view('veiculo-listar', compact('veiculos'));
    }

    // ... Mantenha os métodos remover e editar por enquanto, não os altere ainda.
}