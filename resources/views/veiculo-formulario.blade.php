
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veículo</title>
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
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
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
        <h1>Cadastro de Veículo</h1>

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

        <form action="/veiculo/store" method="POST">
            @csrf {{-- Token de segurança do Laravel --}}

            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" value="{{ old('marca') }}" required><br>

            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" value="{{ old('modelo') }}" required><br>

            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" value="{{ old('ano') }}" required><br>

            <label for="placa">Placa:</label>
            <input type="text" id="placa" name="placa" value="{{ old('placa') }}" required><br>

            <label for="cor">Cor:</label>
            <input type="text" id="cor" name="cor" value="{{ old('cor') }}" required><br>

            <button type="submit">Cadastrar Veículo</button>
        </form>
        <p><a href="/veiculo/listar">Ver Veículos Cadastrados</a></p>
    </div>
</body>
</html>