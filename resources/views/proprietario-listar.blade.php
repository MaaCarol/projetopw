<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proprietários</title>
    <style>
        /* Estilos básicos para alertas e tabela */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .add-link {
            display: inline-block;
            margin-bottom: 15px;
            background-color: #28a745;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
        }
        .add-link:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Proprietários</h1>

        {{-- Bloco para exibir mensagens de sucesso --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="/proprietario/formulario" class="add-link">Cadastrar Novo Proprietário</a>

        @if ($proprietarios->isEmpty())
            <p>Nenhum proprietário cadastrado ainda.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proprietarios as $proprietario)
                        <tr>
                            <td>{{ $proprietario->id_proprietario }}</td>
                            <td>{{ $proprietario->nome }}</td>
                            <td>{{ $proprietario->cpf }}</td>
                            <td>{{ $proprietario->telefone }}</td>
                            <td>{{ $proprietario->email }}</td>
                            <td>
                                <a href="/proprietario/editar/{{ $proprietario->id_proprietario }}">Editar</a> |
                                <a href="/proprietario/remover/{{ $proprietario->id_proprietario }}">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>