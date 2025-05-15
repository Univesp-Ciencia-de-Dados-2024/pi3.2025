<?php include 'includes/header.php'; ?>

<div class="container mt-5">

    <?php if(isset($_SESSION['erros'])): ?>
        <div class="alert alert-danger">
            <?php 
            foreach($_SESSION['erros'] as $erro) {
                echo "<p>$erro</p>";
            }
            ?>
        </div>
    <?php unset($_SESSION['erros']); endif; ?>

    <?php if(isset($_SESSION['sucesso'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['sucesso'] ?>
        </div>
    <?php unset($_SESSION['sucesso']); endif; ?>

    <h2>Cadastro de Munícipe</h2>
    <form action="cadastro_processa.php" method="POST">
        <div class="form-group">
            <label>Nome Completo</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Idade</label>
            <input type="number" name="idade" class="form-control">
        </div>
        <div class="form-group">
            <label>Sexo</label>
            <select name="sexo" class="form-control">
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outro</option>
            </select>
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control">
        </div>
        <div class="form-group">
            <label>Endereço</label>
            <input type="text" name="endereco" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
