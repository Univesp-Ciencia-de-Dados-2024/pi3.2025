<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
            display: flex;
            flex-direction: row;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
            max-width: 800px;
            width: 90%;
        }

        .image-section {
            flex: 1;
            background-image: url('../public/assets/img/ppopular.jpg');
            background-size: cover;
            background-position: center;
        }

        .form-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            max-width: 300px;
        }

        input {
            padding: 12px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
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

        a {
            margin-top: 10px;
            color: white;
            text-decoration: none;
            font-size: 0.9em;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
<!-- acecssibilidade -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
   <link rel="stylesheet" href="https://camarabatatais.com.br/recursos/icons/fontawesome5.9.0/css/all.css" />
   <link rel="stylesheet" href="https://camarabatatais.com.br/recursos/css/default.css" />
   <link rel="stylesheet" href="https://camarabatatais.com.br/recursos/css/asb.css" />
</head>
<body>
    <div class="login-container">
        <div class="image-section"></div>
        <div class="form-section">
            <h1>Login</h1>
            <form action="/sipap/admin/login" method="POST">
                <input id="username" name="username" type="text" placeholder="E-mail" required>
                <input id="password" name="password" type="password" placeholder="Senha" required>
                <button type="submit">Entrar</button>
                <a href="#">Esqueceu a senha?</a>
            </form>
        </div>
    </div>

<!-- Bootstrap core JavaScript-->
<script src="/modelo/public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/modelo/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/modelo/public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/modelo/public/assets/js/sb-admin-2.min.js"></script>
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
    ></script>
    <script type="text/javascript" src="https://camarabatatais.com.br/recursos/js/asb.js"></script>
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>

    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>


</body>
</html>