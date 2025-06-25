<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Anúncios</title>
    <style>
        /* Seus estilos CSS, se houver, ou os padrões que eu sugeri */
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 900px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; vertical-align: top; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
        .alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; }
        .alert-success { color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; }
        .alert-error { color: #a94442; background-color: #f2dede; border-color: #ebccd1; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Anúncios</h1>

        {{-- Bloco para exibir mensagens de sucesso ou erro --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <p><a href="{{ route('anuncio-formulario') }}">Cadastrar Novo Anúncio</a></p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
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
                    <td>{{ $anuncio->descricao }}</td>
                    <td>R$ {{ number_format($anuncio->preco, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($anuncio->data_publicacao)->format('d/m/Y') }}</td>
                    <td>
                        {{-- Acessa o relacionamento proprietario --}}
                        @if ($anuncio->proprietario)
                            {{ $anuncio->proprietario->nome }} ({{ $anuncio->proprietario->email }})
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        {{-- Acessa o relacionamento veiculo --}}
                        @if ($anuncio->veiculo)
                            {{ $anuncio->veiculo->marca }} - {{ $anuncio->veiculo->modelo }} ({{ $anuncio->veiculo->placa }})
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('anuncio-remover', $anuncio->id_anuncio) }}" onclick="return confirm('Tem certeza que deseja remover este anúncio?');">Excluir</a> |
                        <a href="{{ route('anuncio-editar', $anuncio->id_anuncio) }}">Atualizar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
</html>