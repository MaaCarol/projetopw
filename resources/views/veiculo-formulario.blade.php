
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Veículo</title>
</head>
<body>
    <h1>Cadastrar Novo Veículo</h1>

    <form action="{{ route('veiculo-store') }}" method="POST">
        @csrf

        <label for="marca">Marca:</label><br>
        <input type="text" name="marca" id="marca" required><br><br>

        <label for="modelo">Modelo:</label><br>
        <input type="text" name="modelo" id="modelo" required><br><br>

        <label for="ano">Ano:</label><br>
        <input type="number" name="ano" id="ano" required><br><br>

        <label for="placa">Placa:</label><br>
        <input type="text" name="placa" id="placa" required><br><br>

        <label for="cor">Cor:</label><br>
        <input type="text" name="cor" id="cor" required><br><br>

        <button type="submit">Cadastrar Veículo</button>
    </form>

    <br>
    <a href="{{ route('veiculo-listar') }}">Ver Lista de Veículos</a>
</body>
</html>