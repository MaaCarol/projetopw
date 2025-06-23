
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Anúncio</title>
</head>
<body>
    <h1>Criar Novo Anúncio</h1>

    <form action="{{ route('anuncio-store') }}" method="POST">
        @csrf

        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea name="descricao" id="descricao" rows="5"></textarea><br><br>

        <label for="preco">Preço:</label><br>
        <input type="number" name="preco" id="preco" step="0.01" required><br><br>

        <label for="data_publicacao">Data de Publicação:</label><br>
        <input type="date" name="data_publicacao" id="data_publicacao" required><br><br>

        <label for="id_proprietario">ID do Proprietário:</label><br>
        <input type="number" name="id_proprietario" id="id_proprietario" required><br><br>

        <label for="id_veiculo">ID do Veículo:</label><br>
        <input type="number" name="id_veiculo" id="id_veiculo" required><br><br>

        <button type="submit">Publicar Anúncio</button>
    </form>

    <br>
    <a href="{{ route('anuncio-listar') }}">Ver Lista de Anúncios</a>
</body>
</html>