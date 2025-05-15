<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.3);
        }

        header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 90vh;
        }

        .welcome-section, .form-section {
            margin: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            max-width: 600px;
            width: 90%;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 3em;
        }

        p {
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input {
            padding: 10px;
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

        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <header>
        <h2>Bem-vindo!</h2>
        <a href="/popular/login">Login</a>
    </header>

<!-- CONTENT -->

<?php
    try
    {
        echo view($view);
    }
    catch (Exception $e)
    {
        echo "<pre><code>$e</code></pre>";
    }
?>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
	

</footer>

<!-- SCRIPTS -->

<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>

<!-- -->

</body>
</html>
