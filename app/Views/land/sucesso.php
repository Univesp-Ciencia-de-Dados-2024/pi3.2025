<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .confirmation-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            max-width: 600px;
            width: 90%;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        p {
            margin-bottom: 20px;
            font-size: 1.2em;
        }

        button {
            padding: 12px;
            background-color: #4285f4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #357ae8;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h1>Registro Confirmado!</h1>
        <p>Seu cadastro foi realizado com sucesso e registrado na base de dados.</p>
        <button onclick="window.location.href='../home'">Voltar para a Página Inicial</button>
        
    </div>
</body>
</html>
