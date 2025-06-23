
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Proprietário</title>
</head>
<body>
    <h1>Cadastrar Novo Proprietário</h1>

    <form action="{{ route('proprietario-store') }}" method="POST">
        @csrf

        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" name="cpf" id="cpf" required><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" name="telefone" id="telefone"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <button type="submit">Cadastrar Proprietário</button>
    </form>

    <br>
    <a href="{{ route('proprietario-listar') }}">Ver Lista de Proprietários</a>
</body>
</html>