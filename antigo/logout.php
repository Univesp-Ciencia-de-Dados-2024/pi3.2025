<?php
session_start();

// Armazena mensagem antes de destruir a sessão
$_SESSION['sucesso_logout'] = "Logout realizado com sucesso!";

// Remove apenas as variáveis de autenticação
unset(
    $_SESSION['usuario_id'],
    $_SESSION['usuario_nome'],
    $_SESSION['logado']
);

// Redireciona imediatamente
header("Location: login.php");
exit;
?>