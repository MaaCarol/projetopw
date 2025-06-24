<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Anúncios</title>
    <style>
        /* Estilos básicos para alertas e tabela */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 900px;
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
        <h1>Lista de Anúncios</h1>

        {{-- Bloco para exibir mensagens de sucesso --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="/anuncio/formulario" class="add-link">Cadastrar Novo Anúncio</a>

        @if ($anuncios->isEmpty())
            <p>Nenhum anúncio cadastrado ainda.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Preço</th>
                        <th>Publicação</th>
                        <th>Proprietário</th>
                        <th>Veículo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anuncios as $anuncio)
                        <tr>
                            <td>{{ $anuncio->id_anuncio }}</td>
                            <td>{{ $anuncio->titulo }}</td>
                            <td>R$ {{ number_format($anuncio->preco, 2, ',', '.') }}</td> {{-- Formata o preço --}}
                            <td>{{ \Carbon\Carbon::parse($anuncio->data_publicacao)->format('d/m/Y') }}</td> {{-- Formata a data --}}
                            <td>{{ $anuncio->proprietario->nome ?? 'N/A' }}</td> {{-- Acessa a relação e o nome do proprietário --}}
                            <td>
                                {{ $anuncio->veiculo->marca ?? 'N/A' }} {{ $anuncio->veiculo->modelo ?? 'N/A' }}
                                ({{ $anuncio->veiculo->placa ?? 'N/A' }})
                            </td> {{-- Acessa a relação e os dados do veículo --}}
                            <td>
                                <a href="/anuncio/editar/{{ $anuncio->id_anuncio }}">Editar</a> |
                                <a href="/anuncio/remover/{{ $anuncio->id_anuncio }}">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>