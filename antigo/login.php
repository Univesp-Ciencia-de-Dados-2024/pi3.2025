<?php if(isset($_SESSION['sucesso_logout'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['sucesso_logout'] ?>
        <?php unset($_SESSION['sucesso_logout']); ?>
    </div>
<?php endif; ?>


<?php 
session_start();
include 'includes/header.php'; 
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if(isset($_SESSION['login_erro'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['login_erro'] ?>
                    <?php unset($_SESSION['login_erro']); ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Acesso do Munícipe</h4>
                </div>
                <div class="card-body">
                    <form action="login_processa.php" method="POST">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" class="form-control" 
                                value="<?= isset($_SESSION['login_email']) ? 
                                    htmlspecialchars($_SESSION['login_email']) : '' ?>" 
                                required>
                        </div>
                        
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" name="senha" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Não tem conta? <a href="cadastro.php">Cadastre-se aqui</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>