<?php
session_start();
require 'includes/conexao.php';

// Array para armazenar erros e dados anteriores
$_SESSION['erros'] = [];
$_SESSION['dados_anteriores'] = $_POST;

// Validação dos campos
$campos_requeridos = [
    'nome' => 'Nome é obrigatório',
    'email' => 'E-mail é obrigatório',
    'senha' => 'Senha é obrigatória'
];

foreach ($campos_requeridos as $campo => $mensagem) {
    if (empty($_POST[$campo])) {
        $_SESSION['erros'][$campo] = $mensagem;
    }
}

// Validação de e-mail
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['erros']['email'] = 'E-mail inválido';
}

// Validação de senha
if (strlen($_POST['senha']) < 6) {
    $_SESSION['erros']['senha'] = 'Senha deve ter no mínimo 6 caracteres';
}

// Verificar se e-mail já existe
if (!isset($_SESSION['erros']['email'])) {
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    if ($stmt->fetch()) {
        $_SESSION['erros']['email'] = 'Este e-mail já está cadastrado';
    }
}

// Se houver erros, redireciona de volta
if (!empty($_SESSION['erros'])) {
    header('Location: cadastro.php');
    exit;
}

// Criptografar senha
$senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// Inserir no banco de dados
try {
    $stmt = $pdo->prepare("INSERT INTO usuarios 
        (nome, idade, sexo, telefone, endereco, email, senha) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->execute([
        htmlspecialchars($_POST['nome']),
        intval($_POST['idade']),
        $_POST['sexo'],
        htmlspecialchars($_POST['telefone']),
        htmlspecialchars($_POST['endereco']),
        $_POST['email'],
        $senha_hash
    ]);

    // Limpar dados da sessão
    unset($_SESSION['erros'], $_SESSION['dados_anteriores']);
    
    // Redirecionar para login com mensagem de sucesso
    $_SESSION['sucesso'] = 'Cadastro realizado com sucesso! Faça seu login.';
    header('Location: login.php');

} catch (PDOException $e) {
    // Registrar erro em logs
    error_log('Erro no cadastro: ' . $e->getMessage());
    
    $_SESSION['erros']['geral'] = 'Erro ao cadastrar. Tente novamente mais tarde.';
    header('Location: cadastro.php');
}

exit;