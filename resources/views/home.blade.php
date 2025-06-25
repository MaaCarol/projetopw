<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Sistema de Anúncios</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5; /*cor do fundo */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            color: #000000; 
            position: relative; 
        }
        h1 {
            color: #000000; 
            margin-bottom: 40px;
            font-size: 2.5em;
            font-weight: 600;
            text-align: center; 
            width: 100%;
        }
        .button-group {
            display: grid;
            grid-template-columns: 1fr 1fr; 
            gap: 20px; 
            justify-items: center; 
            width: 90%; 
            max-width: 700px; 
        }
        .button-group a {
            display: flex;
            justify-content: center;
            align-items: center;
            color: white; 
            padding: 15px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: 500;
            
            width: 100%;
            max-width: 280px;
            box-sizing: border-box;
        }
       

        .btn-cadastro-veiculo {
            background-color: #FF69B4; 
        }
      

        .btn-listar-veiculos {
            background-color: #FF69B4; 
            color: white; 
            border: 1px solid #FF69B4;
        }
      

        .btn-cadastro-proprietario {
            background-color: #20B2AA;
        }
       

        .btn-listar-proprietarios {
            background-color: #20B2AA; 
            color: white; 
            border: 1px solid #20B2AA;
        }
      
        .btn-cadastro-anuncio {
            background-color: #FFD700; 
            color: black; 
        }
      

        .btn-listar-anuncios {
            background-color: #FFD700; 
            color: black; 
            border: 1px solid #FFD700; 
        }
       
        
        .footer-name {
            text-align: center;
            margin-top: 50px; 
            padding: 20px;
            font-size: 1em; 
            color:rgb(0, 0, 0);
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: transparent; 
        }

        
        @media (max-width: 600px) {
            .button-group {
                grid-template-columns: 1fr; 
            }
            h1 {
                font-size: 2em;
            }
            .footer-name {
                margin-top: 30px;
                font-size: 0.9em;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <h1>SISTEMA</h1>
    <div class="button-group">
        <a href="/veiculo/formulario" class="btn-cadastro-veiculo">Cadastrar Veículo</a>
        <a href="/veiculo/list" class="btn-listar-veiculos">Listar Veículos</a>

        <a href="/proprietario/formulario" class="btn-cadastro-proprietario">Cadastrar Proprietário</a>
        <a href="/proprietario/listar" class="btn-listar-proprietarios">Listar Proprietários</a>

        <a href="/anuncio/formulario" class="btn-cadastro-anuncio">Cadastrar Anúncio</a>
        <a href="/anuncio/listar" class="btn-listar-anuncios">Listar Anúncios</a>
    </div>

    <footer class="footer-name">
        Maria Carolina Almeida Pires, 3DS-AMS 
    </footer>
</body>
</html>