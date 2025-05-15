<?php
session_start();
include 'includes/conexao.php';

if(!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}


// Verificação de login e processamento do voto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['usuario_id'];
    $projeto_id = $_POST['projeto_id'];
    $aprovado = $_POST['aprovado'];
    $justificativa = $_POST['justificativa'];

    $stmt = $pdo->prepare("INSERT INTO votos (usuario_id, projeto_id, aprovado, justificativa) VALUES (?, ?, ?, ?)");
    $stmt->execute([$usuario_id, $projeto_id, $aprovado, $justificativa]);
    
    header("Location: projetos.php");
    exit;
}

$projeto_id = $_GET['projeto_id'];
$stmt = $pdo->prepare("SELECT * FROM projetos WHERE id = ?");
$stmt->execute([$projeto_id]);
$projeto = $stmt->fetch();
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h2>Votar no Projeto: <?= $projeto['titulo'] ?></h2>
    <form method="POST">
        <input type="hidden" name="projeto_id" value="<?= $projeto['id'] ?>">
        
        <div class="form-group">
            <label>Você aprova este projeto?</label>
            <select name="aprovado" class="form-control" required>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Justificativa (opcional)</label>
            <textarea name="justificativa" class="form-control" rows="3"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar Voto</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
