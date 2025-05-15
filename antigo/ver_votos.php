<?php
include 'includes/conexao.php';

if(!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}


$projeto_id = $_GET['projeto_id'];
$stmt = $pdo->prepare("
    SELECT v.*, u.sexo, u.idade 
    FROM votos v
    LEFT JOIN usuarios u ON v.usuario_id = u.id
    WHERE projeto_id = ?
");
$stmt->execute([$projeto_id]);
$votos = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h2>Votos Registrados</h2>
    
    <?php foreach ($votos as $voto): ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Voto <?= $voto['aprovado'] ? 'a favor' : 'contra' ?></h5>
            <p class="card-text"><?= $voto['justificativa'] ?></p>
            <small class="text-muted">
                Dados anônimos: 
                Sexo: <?= $voto['sexo'] ?>, 
                Idade: <?= $voto['idade'] ?>
            </small>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>
