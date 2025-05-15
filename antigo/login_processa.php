<?php
session_start();
require 'includes/conexao.php';

// Limpar variáveis de sessão relacionadas ao login
unset($_SESSION['login_erro'], $_SESSION['login_email']);

// Validação básica
if(empty($_POST['email']) || empty($_POST['senha'])) {
    $_SESSION['login_erro'] = "Preencha todos os campos!";
    header("Location: login.php");
    exit;
}

$email = trim($_POST['email']);
$senha = $_POST['senha'];

try {
    // Buscar usuário no banco
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if(!$usuario || !password_verify($senha, $usuario['senha'])) {
        $_SESSION['login_erro'] = "E-mail ou senha inválidos!";
        $_SESSION['login_email'] = $email; // Mantém o e-mail digitado
        header("Location: login.php");
        exit;
    }

    // Criar sessão do usuário
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nome'] = htmlspecialchars($usuario['nome']);
    $_SESSION['logado'] = true;

    // Redirecionar para área logada
    header("Location: projetos.php");

} catch (PDOException $e) {
    error_log("Erro no login: " . $e->getMessage());
    $_SESSION['login_erro'] = "Erro no sistema. Tente novamente mais tarde.";
    header("Location: login.php");
}

exit;