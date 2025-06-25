<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VeiculoModel; 

class VeiculoController extends Controller
{
    public function formulario()
    {
        return view('veiculo-formulario');
    }

    public function store(Request $dados)
    {
       
        $dados->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1), 
            'placa' => 'required|string|max:8|unique:veiculo,placa,' . ($dados->id ?? 'NULL') . ',id_veiculo', 
            'cor' => 'required|string|max:50',
        ], [
            'marca.required' => 'O campo marca é obrigatório.',
            'modelo.required' => 'O campo modelo é obrigatório.',
            'ano.required' => 'O campo ano é obrigatório.',
            'ano.integer' => 'O campo ano deve ser um número inteiro.',
            'ano.min' => 'O ano mínimo permitido é :min.',
            'ano.max' => 'O ano máximo permitido é :max.',
            'placa.required' => 'O campo placa é obrigatório.',
            'placa.unique' => 'Esta placa já está cadastrada.',
            'cor.required' => 'O campo cor é obrigatório.',
        ]);

        if (isset($dados->id) && !empty($dados->id)) {
        
            $veiculo = VeiculoModel::find($dados->id);
            if ($veiculo) {
                $veiculo->update($dados->all());
                return redirect()->route('veiculo-list')->with('success', 'Veículo atualizado com sucesso!');
            } else {
                return redirect()->route('veiculo-list')->with('error', 'Veículo não encontrado para atualização.');
            }
        } else {
            
            VeiculoModel::create($dados->all()); 
            return redirect()->route('veiculo-list')->with('success', 'Veículo cadastrado com sucesso!');
        }
    }

    public function list() 
    {
        $veiculos = VeiculoModel::all();
        return view('veiculo-listar', ['veiculos' => $veiculos]);
    }

    public function remove($id) 
    {
        $veiculo = VeiculoModel::destroy($id); 
        if ($veiculo) {
            return redirect()->route('veiculo-list')->with('success', 'Veículo removido com sucesso!');
        } else {
            return redirect()->route('veiculo-list')->with('error', 'Veículo não encontrado para remoção.');
        }
    }

    public function editar($id) 
    {
        $veiculo = VeiculoModel::find($id); 
        if (!$veiculo) {
            return redirect()->route('veiculo-list')->with('error', 'Veículo não encontrado para edição.');
        }
        return view('veiculo-formulario', ['veiculo' => $veiculo]);
    }
}