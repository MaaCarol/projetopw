<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietario; // Importe o Model Proprietario

class ProprietarioController extends Controller
{
    public function formulario()
    {
        return view('proprietario-formulario');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:proprietario,cpf', // CPF único na tabela proprietario
            'telefone' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:proprietario,email', // Email único
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.'
        ]);

        // Cria um novo Proprietario usando os dados validados
        Proprietario::create($request->all());

        return redirect('/proprietario/listar')->with('success', 'Proprietário cadastrado com sucesso!');
    }

    public function listar()
    {
        $proprietarios = Proprietario::all(); // Busca todos os proprietários
        return view('proprietario-listar', compact('proprietarios'));
    }

    // ... Mantenha os métodos remover e editar por enquanto, não os altere ainda.
}