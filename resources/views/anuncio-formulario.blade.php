<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($anuncio) ? 'Editar Anúncio' : 'Cadastrar Anúncio' }}</title>
    <style>
        /* Mantenha os estilos CSS que você já tem ou use um padrão simples para teste */
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; color: #333; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea, input[type="number"], input[type="date"], select { /* Adicionado select e input type="date" */
            width: calc(100% - 22px); padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;
        }
        button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #0056b3; }
        .alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; }
        .alert-danger { color: #a94442; background-color: #f2dede; border-color: #ebccd1; }
        .alert-success { color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; }
        .alert-error { color: #a94442; background-color: #f2dede; border-color: #ebccd1; }
        ul { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ isset($anuncio) ? 'Editar Anúncio' : 'Cadastrar Novo Anúncio' }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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

        {{-- Assumindo que você tem uma rota 'anuncio-store' para salvar --}}
        <form action="{{ route('anuncio-store') }}" method="POST">
            @csrf

            {{-- Campo oculto para o ID, necessário para a edição --}}
            <input type="hidden" name="id" value="{{ isset($anuncio) ? $anuncio->id_anuncio : old('id') }}">

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $anuncio->titulo ?? '') }}" required><br>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="5" required>{{ old('descricao', $anuncio->descricao ?? '') }}</textarea><br>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" value="{{ old('preco', $anuncio->preco ?? '') }}" required><br>

            <label for="data_publicacao">Data de Publicação:</label>
            <input type="date" id="data_publicacao" name="data_publicacao" value="{{ old('data_publicacao', ($anuncio->data_publicacao ?? '') ? \Carbon\Carbon::parse($anuncio->data_publicacao)->format('Y-m-d') : '') }}" required><br>

            <label for="id_proprietario">Proprietário:</label>
            <select id="id_proprietario" name="id_proprietario" required>
                <option value="">Selecione um Proprietário</option>
                {{-- Verifica se $proprietarios está definida antes de iterar --}}
                @isset($proprietarios)
                    @foreach ($proprietarios as $proprietario)
                        <option value="{{ $proprietario->id_proprietario }}"
                            {{ old('id_proprietario', $anuncio->id_proprietario ?? '') == $proprietario->id_proprietario ? 'selected' : '' }}>
                            {{ $proprietario->nome }} ({{ $proprietario->cpf }})
                        </option>
                    @endforeach
                @endisset
            </select><br>

            <label for="id_veiculo">Veículo:</label>
            <select id="id_veiculo" name="id_veiculo" required>
                <option value="">Selecione um Veículo</option>
                {{-- Verifica se $veiculos está definida antes de iterar --}}
                @isset($veiculos)
                    @foreach ($veiculos as $veiculo)
                        <option value="{{ $veiculo->id_veiculo }}"
                            {{ old('id_veiculo', $anuncio->id_veiculo ?? '') == $veiculo->id_veiculo ? 'selected' : '' }}>
                            {{ $veiculo->marca }} - {{ $veiculo->modelo }} ({{ $veiculo->placa }})
                        </option>
                    @endforeach
                @endisset
            </select><br>

            <button type="submit">{{ isset($anuncio) ? 'Atualizar Anúncio' : 'Cadastrar Anúncio' }}</button>
        </form>
        <p><a href="{{ route('anuncio-listar') }}">Voltar para a Lista de Anúncios</a></p>
    </div>
</body>
</html>