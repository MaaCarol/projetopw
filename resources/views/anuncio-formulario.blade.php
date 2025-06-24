<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Anúncio</title>
    <style>
        /* Estilos básicos para alertas e formulário */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
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
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea,
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Anúncio</h1>

        {{-- Bloco para exibir erros de validação --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Bloco para exibir mensagens de sucesso --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/anuncio/store" method="POST">
            @csrf {{-- Token de segurança do Laravel --}}

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required><br>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao">{{ old('descricao') }}</textarea><br>

            <label for="preco">Preço:</label>
            <input type="number" step="0.01" id="preco" name="preco" value="{{ old('preco') }}" required><br>

            <label for="data_publicacao">Data de Publicação:</label>
            <input type="date" id="data_publicacao" name="data_publicacao" value="{{ old('data_publicacao', date('Y-m-d')) }}" required><br>
            
            <label for="id_proprietario">Proprietário:</label>
            <select name="id_proprietario" id="id_proprietario" required>
                <option value="">Selecione um Proprietário</option>
                @foreach ($proprietarios as $proprietario)
                    <option value="{{ $proprietario->id_proprietario }}" {{ old('id_proprietario') == $proprietario->id_proprietario ? 'selected' : '' }}>
                        {{ $proprietario->nome }} (CPF: {{ $proprietario->cpf }})
                    </option>
                @endforeach
            </select><br>

            <label for="id_veiculo">Veículo:</label>
            <select name="id_veiculo" id="id_veiculo" required>
                <option value="">Selecione um Veículo</option>
                @foreach ($veiculos as $veiculo)
                    <option value="{{ $veiculo->id_veiculo }}" {{ old('id_veiculo') == $veiculo->id_veiculo ? 'selected' : '' }}>
                        {{ $veiculo->marca }} {{ $veiculo->modelo }} ({{ $veiculo->placa }})
                    </option>
                @endforeach
            </select><br>

            <button type="submit">Cadastrar Anúncio</button>
        </form>
        <p><a href="/anuncio/listar">Ver Anúncios Cadastrados</a></p>
    </div>
</body>
</html>