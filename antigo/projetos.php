<?php
session_start();
include 'includes/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

if(!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM projetos");
$projetos = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h2>Projetos Legislativos</h2>
    
    <?php foreach ($projetos as $projeto): ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><?= $projeto['titulo'] ?></h5>
            <p class="card-text"><?= $projeto['descricao'] ?></p>
            <a href="votar.php?projeto_id=<?= $projeto['id'] ?>" class="btn btn-primary">Votar neste projeto</a>
            <a href="ver_votos.php?projeto_id=<?= $projeto['id'] ?>" class="btn btn-secondary">Ver votos</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>
